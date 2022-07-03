<?php

use Database\Database;
use GuzzleHttp\Exception\ClientException;

class Model
{
    public $db;
    public $controller;
    public $limit = 0;

//      ┌─────────────┐
//      │  CONSTRUCT  │
//      └─────────────┘
    public function __construct($controller)
    {
        $this->controller = $controller;

        require_once($_SERVER['DOCUMENT_ROOT'] . '/app/Database/Database.php');
        $this->db = Database::connect();
    }

//      ┌───────┐
//      │  GET  │
//      └───────┘
    public function get($select, $from, $where = null, $value = null)
    {
        if ( $where != null ){
            if ( $this->limit != 0 ){
                $request = $this->db->select(
                    'SELECT '.$select.' FROM '.$from.' WHERE '.$where.' = ? LIMIT '.$this->limit, [$value]
                );

                $this->limit = 0;
                return $request;
            }
            else{
                $request = $this->db->select(
                    'SELECT '.$select.' FROM '.$from.' WHERE '.$where.' = ?', [$value]
                );

                return $request;
            }
        }
        else{
            if ( $this->limit != 0 ){
                $request = $this->db->select(
                    'SELECT '.$select.' FROM '.$from.' LIMIT '.$this->limit
                );
                
                $this->limit = 0;
                return $request;
            }
            else{
                $request = $this->db->select(
                    'SELECT '.$select.' FROM '.$from
                );
                
                return $request;
            }
        }
    }

//      ┌─────────┐
//      │  STORE  │
//      └─────────┘
    public function store($where, $data)
    {
        if( ! empty($this->get( 'MAX(id)', $where )) ) {

            $max_id_temp = $this->get( 'MAX(id)', $where );
            $max_id = $max_id_temp[0]['MAX(id)'];
        }
        else {

            $max_id = 0;
        }
        
        $data['id'] = $max_id + 1;

        try {
            $this->db->insert(
                $where, 
                $data
            );
        } catch (Exception $e) {
            echo 'Erreur : ' . $e->getMessage();
            die();
        }
    }

//      ┌──────────┐
//      │  UPDATE  │
//      └──────────┘
    public function update($select, $data, $where)
    {
        $this->db->update(
            $select,
            $data,
            $where
        );
    }

//      ┌──────────┐
//      │  DELETE  │
//      └──────────┘
    public function delete($select, $where)
    {
        $this->db->delete(
            $select,
            $where
        );
    }

//      ┌───────────┐
//      │  GET API  │
//      └───────────┘
    public function get_api($url, $key = null)
    {
        $client = new GuzzleHttp\Client();

        try {
            $request = $client->request('GET', $url.$key);
        } catch (ClientException $e) {
            echo 'Erreur : ' . $e->getMessage();
            die();
        }

        header('Content-Type: application/json; charset=utf-8');
        return json_decode($request->getBody(), true);
    }
}