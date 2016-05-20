<?php

class Database {

    /**
     * Properties
     */
    private $connections = array();
    private $config = array();
    private $defaults = array();

    /**
     * Construct
     *
     * @param $config (array) Site config array
     * @param $connect (bool) Whether to create connections
     */
    public function __construct( array $config = array(), $connect = true ) {

        // Set config
        $this->config = $config;

        // Set default config
        $this->defaults = array(
            'database_type' => 'mysql',
            'server' => 'localhost',
            'post' => '3306',
            'charset' => 'utf8'
        );

        // Make connections
        if ( $connect === true ) {
            $this->connect_all();
        }

    }

    /**
     * Has Connections
     */
    public function has_connections() {
        return !empty($this->connections);
    }

    /**
     * Has Connection
     *
     * @param $id (string) Connection ID
     */
    public function has_connection( $id ) {
        return array_key_exists($id, $this->connections);
    }

    /**
     * Connect All
     */
    public function connect_all() {

        if ( !$this->has_connections() ) {
            return false;
        }

        // Create connections
        foreach ( $this->config['db'] as $id => $credentials ) {
            $this->connections[$id] = new medoo(array_merge(
                $this->defaults,
                $credentials
            ));
        }

    }

    /**
     * Connect
     *
     * @param $id (string) Connection ID
     * @return medoo object
     */
    public function connect( $id ) {

        if ( !$this->has_connection($id) ) {
            return false;
        }

        // Create connection
        $this->connections[$id] = new medoo(array_merge(
            $this->defaults,
            $this->config[$id]
        ));

        // Return the connection
        return $this->connections[$id];

    }

    /**
     * Query
     *
     * @param $id (string) Connection ID
     * @return medoo object
     */
    public function query( $id ) {

        if ( !$this->has_connection($id) ) {
            throw new Exception(sprintf('Connection ID: %s not found', $id));
        }

        return $this->connections[$id];
    }


}
