<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class SampleSMSTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $serverHEader = [
            'username' => "plivo1",
            'auth_id' => "20S0KPNOIM"
        ];

        $data = [
            'from' => '45509198',
            'to' => '123456',
            'text' => "Hi!"
        ];

        $this->post('/outbound/sms' , $data, $serverHEader)
            ->seeJsonEquals(['error' => '' , 'message' => 'inbound sms ok']);
    }
}
