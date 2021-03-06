<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/zf2 for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace ZendTest\Ldap\Node;

use ZendTest\Ldap as TestLdap;

/**
 * @group      Zend_Ldap
 * @group      Zend_Ldap_Node
 */
class AttributeIterationTest extends TestLdap\AbstractTestCase
{
    public function testSimpleIteration()
    {
        $node = $this->createTestNode();
        $i    = 0;
        $data = [];
        foreach ($node->getAttributes() as $k => $v) {
            $this->assertNotNull($k);
            $this->assertNotNull($v);
            $this->assertEquals($node->$k, $v);
            $data[$k] = $v;
            $i++;
        }
        $this->assertEquals(5, $i);
        $this->assertEquals($i, count($node));
        $this->assertEquals([
                                 'boolean'     => [true, false],
                                 'cn'          => ['name'],
                                 'empty'       => [],
                                 'host'        => ['a', 'b', 'c'],
                                 'objectclass' => ['account', 'top']], $data);
    }
}
