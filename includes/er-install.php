<?php

class ER_Install
{

    //Function to Setup DB Tables
    public static function activate()
    {
        global $wpdb;
        $table_prefix = $wpdb->prefix;

        $easyreplace = $table_prefix.'easyreplace';

        $easyreplace_query = "CREATE TABLE IF NOT EXISTS $easyreplace(
        id INT(9) NOT NULL AUTO_INCREMENT,
        name VARCHAR(100) NOT NULL,
        replaceat VARCHAR(100) NOT NULL,
        places VARCHAR(50) NOT NULL,
        sourcestring VARCHAR(1000) NOT NULL,
        destinationstring VARCHAR(2000) NOT NULL,
        occurences INT(9) NOT NULL,    
        created_at DATETIME NOT NULL,
        updated_at DATETIME NOT NULL,
        misc VARCHAR(50) NOT NULL,
        status TINYINT(5),
        Primary Key id (id)
        )ENGINE=InnoDB DEFAULT CHARSET=utf8;";

        $wpdb->query($easyreplace_query); 
    }

    public static function deactivate()
    {
      return true;
    }

    public static function delete()
    {
        global $wpdb;

        $table_prefix = $wpdb->prefix;

        $easyreplace = $table_prefix.'easyreplace';

        $easyreplace_query = "DROP TABLE $easyreplace;";
        
        $wpdb->query($easyreplace_query);
    }
}

?>