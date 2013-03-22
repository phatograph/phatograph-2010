<?php

class Doctrine_Tools extends Controller {

    function  __construct() {
        parent::Controller();
        require_once('./FirePHPCore/fb.php');
    }

    function profiler() {

        // set up the profiler
        $profiler = new Doctrine_Connection_Profiler();
        foreach (Doctrine_Manager::getInstance()->getConnections() as $conn) {
            $conn->setListener($profiler);
        }

        // query goes here

        $final = array();

        $q = Doctrine_Query::create()
                ->select('ac.name, COUNT(ar.id) AS num_archive')
                ->from('ACategory ac')
                ->leftJoin('ac.Archives ar')
                ->groupBy('ac.id')
        ;
        $result1 = $q->execute(array(), Doctrine_Core::HYDRATE_ARRAY);

        $q = Doctrine_Query::create()
                ->select('ac.name, ar.title')
                ->from('ACategory ac')
                ->leftJoin('ac.Archives ar')
        ;
        $result2 = $q->execute(array(), Doctrine_Core::HYDRATE_ARRAY);

        $q = Doctrine_Query::create()
                ->select('ar.title, COUNT(c.id) AS num_comment')
                ->from('Archive ar')
                ->leftJoin('ar.AComments c')
                ->groupBy('ar.id')
        ;
        $result3 = $q->execute(array(), Doctrine_Core::HYDRATE_ARRAY);

        $acat_archive = $result2;

        for($i = 0; $i < sizeof($result2); $i++) {
            for($j = 0; $j < sizeof($acat_archive[$i]['Archives']); $j++) {
                for($k = 0; $k < sizeof($result3); $k++) {
                    if($acat_archive[$i]['Archives'][$j]['id'] == $result3[$k]['id']) {
                        $acat_archive[$i]['Archives'][$j]['num_comment'] = $result3[$k]['num_comment'];
                    }
                }
            }
            $acat_archive[$i]['num_archive'] = $result1[$i]['num_archive'];
        }

        $final = $acat_archive;

        // analyze the profiler data
        $time = 0;
        $events = array();
        foreach ($profiler as $event) {
            $time += $event->getElapsedSecs();
            if ($event->getName() == 'query' || $event->getName() == 'execute') {
                $event_details = array(
                        "type" => $event->getName(),
                        "query" => $event->getQuery(),
                        "time" => sprintf("%f", $event->getElapsedSecs())
                );
                if (count($event->getParams())) {
                    $event_details["params"] = $event->getParams();
                }
                $events []= $event_details;
            }
        }

        fb($final);
        fb($events);
        fb('Total Doctrine time: " '.$time);
        fb('"Peak Memory: " '.memory_get_peak_usage());
    }

    function query() {

        /*
        $q = Doctrine_Query::create()
                ->select('ar.title, ac.name')
                ->from('Archive ar')
                ->leftJoin('ar.ACategories ac');
        $result = $q->execute(array(), Doctrine_Core::HYDRATE_ARRAY);
        fb($result, 'Archive and its ACats');
        */

        /*
        $q = Doctrine_Query::create()
                ->select('ac.name, ar.title')
                ->from('ACategory ac')
                ->leftJoin('ac.Archives ar');
        $result = $q->execute(array(), Doctrine_Core::HYDRATE_ARRAY);
        fb($result, 'ACat and its Archives');
        */

        /*
        $q = Doctrine_Query::create()
                ->select('ar.title, c.content')
                ->from('Archive ar')
                ->leftJoin('ar.AComments c');
        $result = $q->execute(array(), Doctrine_Core::HYDRATE_ARRAY);
        fb($result, 'Archive and its Comments');
        */

        /*
        $q = Doctrine_Query::create()
                ->select('ar.title, c.content, q.content')
                ->from('Archive ar')
                ->leftJoin('ar.AComments c')
                ->leftJoin('c.ACommentQuotes q');
        $result = $q->execute(array(), Doctrine_Core::HYDRATE_ARRAY);
        fb($result, 'Archive and its Comments and Quotes');
        */

        /*
        $q = Doctrine_Query::create()
                ->select('ar.title, COUNT(c.id) AS num_comment')
                ->from('Archive ar')
                ->leftJoin('ar.AComments c')
                ->groupBy('ar.id');
        $result = $q->execute(array(), Doctrine_Core::HYDRATE_ARRAY);
        fb($result, 'Archive and number of its comment');
        */

        /*
        $q = Doctrine_Query::create()
                ->select('c.archive_id, COUNT(q.id) AS num_quote')
                ->from('AComment c')
                ->leftJoin('c.ACommentQuotes q')
                ->groupBy('c.archive_id');
        $result = $q->execute(array(), Doctrine_Core::HYDRATE_ARRAY);
        fb($result, 'Archive and number of its Quotes');
        */

        /*
        $q = Doctrine_Query::create()
                ->select('ar.title, ac.name, COUNT(c.id) AS num_comment')
                ->from('Archive ar')
                ->leftJoin('ar.AComments c')
                ->leftJoin('ar.ACategories ac')
                ->groupBy('ar.id, ac.id');
        $result = $q->execute(array(), Doctrine_Core::HYDRATE_ARRAY);
        fb($result, 'Archive and its ACat, and number of its comment');
        */

        /*
        $q = Doctrine_Query::create()
                ->select('ac.name, COUNT(ar.id) AS num_archive')
                ->from('ACategory ac')
                ->leftJoin('ac.Archives ar')
                ->groupBy('ac.id')
        ;
        $result1 = $q->execute(array(), Doctrine_Core::HYDRATE_ARRAY);

        $q = Doctrine_Query::create()
                ->select('ac.name, ar.title')
                ->from('ACategory ac')
                ->leftJoin('ac.Archives ar')
        ;
        $result2 = $q->execute(array(), Doctrine_Core::HYDRATE_ARRAY);

        $q = Doctrine_Query::create()
                ->select('ar.title, COUNT(c.id) AS num_comment')
                ->from('Archive ar')
                ->leftJoin('ar.AComments c')
                ->groupBy('ar.id')
        ;
        $result3 = $q->execute(array(), Doctrine_Core::HYDRATE_ARRAY);

        $acat_archive = $result2;

        for($i = 0; $i < sizeof($result2); $i++) {
            for($j = 0; $j < sizeof($acat_archive[$i]['Archives']); $j++) {
                for($k = 0; $k < sizeof($result3); $k++) {
                    if($acat_archive[$i]['Archives'][$j]['id'] == $result3[$k]['id']) {
                        $acat_archive[$i]['Archives'][$j]['num_comment'] = $result3[$k]['num_comment'];
                    }
                }
            }
            $acat_archive[$i]['num_archive'] = $result1[$i]['num_archive'];
        }

        fb($result1, 'ACat and number of its Archives');
        fb($result2, 'ACat and its Archives');
        fb($result3, 'Archive and number of its Comments');
        FB::info($acat_archive, 'FINAL QUERY');

        */

        $q = Doctrine_Query::create()
                ->select('ar.title, COUNT(c.id) AS num_comment')
                ->from('Archive ar')
                ->leftJoin('ar.AComments c')
                ->groupBy('ar.id')
        ;
        $result3 = $q->fetchArray();
        fb($result3, 'test fetchArray');

    }

    function testsql() {
        $sql = Doctrine_Core::generateSqlFromArray(array(
                'Archive',
                'ACategory',
                'Archive_ACategory',
                'AComment',
                'ACommentQuote'
                )
        );
        fb($sql);
    }

    function testUpdateACat() {

        $q = Doctrine_Query::create()
                ->select('*')
                ->from('Archive_ACategory')
                ->where('archive_id = ?', 1);
        $b = $q->execute();

        fb($b->toArray(), 'coresponding Archive-ACat');

        $q = Doctrine_Query::create()
                ->select('ar.*, ac.*')
                ->from('Archive ar')
                ->leftJoin('ar.ACategories ac')
                ->where('ar.id = ?', 1);
        $result = $q->execute();
        fb($result->toArray(), 'before change ACats');

        $b->delete();

        $q = Doctrine_Query::create()
                ->select('ar.*, ac.*')
                ->from('Archive ar')
                ->leftJoin('ar.ACategories ac')
                ->where('ar.id = ?', 1);
        $result = $q->execute();

        $result[0]['content'] = 'updatedddddddddd';
        $result[0]->link('ACategories', array(2,3,4));

        fb($result->toArray(), 'after change ACats');
        $result->save();

    }

    function testUpdateArcive() {

        $a = Doctrine::getTable('Archive')->find(9999);
        fb($a->toArray());
        $a['title'] = 'test change title from controller';

        $a->save();

        //sluggable and timestampable work quite well :)

    }

    function testAddArchive() {

        $a = new Archive();
        $a['id'] = 9999;
        $a['title'] = 'test add from controller';
        $a['content'] = 'added from controller';

        $ac = Doctrine::getTable('ACategory')->find(3);

        $a->link('ACategories', array($ac->id, 2));

        fb($a->toArray());
        $a->save();

    }

    function createTables() {

        Doctrine::createTablesFromModels();
        echo 'table(s) created.';

    }

    function loadFixtures() {
        Doctrine_Manager::connection()->execute('SET FOREIGN_KEY_CHECKS = 0');
        /*
         * disable FOREIGN_KEY_CHECKS to avoid some foreign key related errors
         * during the purge.
        */
        Doctrine::loadData(APPPATH.'/fixtures');
        /*
         * Doctrine:loadData() does the work. Every time it is called,
         * it will purge existing data from the tables, and load the
         * Data Fixtures from the given path. If you don’t want the table purge
         * to happen, you need to pass a second argument as true.
        */
        echo "fixtures loaded.";
    }

    function YAML() {
        Doctrine::generateYamlFromModels('schema.yml', 'C:\wamp\www\application\models');
        echo "YAML updated";
    }

}