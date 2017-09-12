<?php


namespace Runner\Tests;
require_once 'elements/FakeClass.php';
require_once 'elements/FakeEmptyClass.php';
/**
 * @author Ibrahim Maïga <maiga.ibrm@gmail.com>.
 */
use Runner\Engine\Runner;

/**
 * Class RunnerTest
 */
class RunnerTest extends \PHPUnit_Framework_TestCase
{

    public function testRunWithCallBackPrimitiveParam() {
        $params = [];
        $params['callback'] = function ($kf): string {
            return "Hi $kf!";
        };
        $params['params'] = 'Kanfa';
        $runner = new Runner($params);
        $this->assertEquals($runner->run(), "Hi Kanfa!");
    }

    public function testRunWithCallBackArrayParam() {
        $params = [];
        $params['callback'] = function ($kf): string {
            return "Hi $kf!";
        };
        $params['params'] = ['Kanfa'];
        $runner = new Runner($params);
        $this->assertEquals($runner->run(), "Hi Kanfa!");
    }

    public function testRunWithCallBackAssociativeArrayParam() {
        $params = [];
        $params['callback'] = function ($kf): string {
            return "Hi $kf!";
        };
        $params['params'] = ['kf' => 'Kanfa'];
        $runner = new Runner($params);
        $this->assertEquals($runner->run(), "Hi Kanfa!");
    }

    public function testRunWithCallBackEmptyParam() {
        $params = [];
        $params['callback'] = function (): string {
            return "Hi Kanfa!";
        };
        $runner = new Runner($params);
        $this->assertEquals($runner->run(), "Hi Kanfa!");
    }

    public function testRunWithDefaultsPrimitiveParam() {
        $params = [];
        $params['class'] = 'Runner\Tests\FakeClass';
        $params['action'] = 'id';
        $params['params'] = 2;
        $runner = new Runner($params);
        $this->assertEquals($runner->run(), 2);
    }

    public function testRunWithDefaultsArrayParam() {
        $params = [];
        $params['class'] = 'Runner\Tests\FakeClass';
        $params['action'] = 'id';
        $params['params'] = [2];
        $runner = new Runner($params);
        $this->assertEquals($runner->run(), 2);
    }

    public function testRunWithDefaultsAssociativeArrayParam() {
        $params = [];
        $params['class'] = 'Runner\Tests\FakeClass';
        $params['action'] = 'id';
        $params['params'] = ['id' => 2];
        $runner = new Runner($params);
        $this->assertEquals($runner->run(), 2);
    }

    public function testRunWithDefaultsEmptyParam() {
        $params = [];
        $params['class'] = 'Runner\Tests\FakeEmptyClass';
        $params['action'] = 'id';
        $runner = new Runner($params);
        $this->assertEquals($runner->run(), 0);
    }
}