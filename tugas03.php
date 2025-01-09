<?php
class Animal {

    public $animals = ['kucing', 'laba-laba', 'sapi'];

    public function __construct($data)
    {
        $this->animals = $data;
    }

    public function index()
    {
        echo "Index berhasil \n";
        foreach ($this->animals as $animal) {
            echo "- " . $animal . "\n";
        }
        echo "\n";
    }

    public function store($data)
    {
        echo "Store : data berhasil ditambahkan ($data)\n";
        array_push($this->animals, $data);
        foreach ($this->animals as $animal) {
            echo "- " . $animal . "\n";
        }
        echo "\n";
    }

    public function update($index, $data)
    {
        echo "Update berhasil \n";
        if (isset($this->animals[$index])) {
            $this->animals[$index] = $data;
            foreach ($this->animals as $animal) {
                echo "- " . $animal . "\n";
            }
        } else {
            echo "Tidak ada index.\n";
        }
        echo "\n";
    }

    public function destroy($index)
    {
        echo "Delete : hewan berhasil dihapus \n";
        if (isset($this->animals[$index])) {
            unset($this->animals[$index]);

            $this->animals = array_values($this->animals);
            foreach ($this->animals as $animal) {
                echo "- " . $animal . "\n";
            }
        } else {
            echo "Tidak ada index.\n";
        }
        echo "\n";
    }
}


$animal = new Animal(['srigala', 'tupai', 'cihuhua','kelinci', 'flamingo']);

$animal->index() .PHP_EOL;

$animal->store('kambing') .PHP_EOL;
$animal->store('unta') .PHP_EOL;


$animal->update(3, 'kupu-kupu') .PHP_EOL;


$animal->destroy(4) .PHP_EOL;

?>