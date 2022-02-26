<?php

class Todo
{
    protected $conn;
    protected $selectAll = "SELECT * FROM todos";

    public function connect($conn)
    {
        $this->conn = $conn;
    }

    // Select all from the table
    public function selectAllQueryMethod()
    {
        $selectAllQuery = $this->conn->query($this->selectAll);

        // Print out the result
        foreach ($selectAllQuery as $row) {
            // Concat the output shown as <ID> - <todo> - <completed>
            print_r("ID: " . $row['id'] . " - Todo: " . $row['todo'] . " - " . "Completed: " . $row["completed"] . PHP_EOL);
        }
        // Close the connection after running the operation
        $selectAllQuery = null;
    }
}
