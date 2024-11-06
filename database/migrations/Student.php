<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('Nama');
            $table->string('NIM');
            $table->string('Email');
            $table->string('Jurusan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
    public function update($id, $data) {
        $query = "UPDATE " . $this->table_name . " 
                  SET name = :name, age = :age, major = :major, gpa = :gpa 
                  WHERE id = :id";
        $stmt = $this->conn->prepare($query);

        // Bind data
        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":name", $data['name']);
        $stmt->bindParam(":age", $data['age']);
        $stmt->bindParam(":major", $data['major']);
        $stmt->bindParam(":gpa", $data['gpa']);

        if ($stmt->execute()) {
            return ["message" => "Student updated successfully"];
        }
        return ["message" => "Unable to update student"];
    }

    // Delete data mahasiswa
    public function delete($id) {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":id", $id);

        if ($stmt->execute()) {
            return ["message" => "Student deleted successfully"];
        }
        return ["message" => "Unable to delete student"];
    }
}

// Mendapatkan method request dan ID jika tersedia
$method = $_SERVER['REQUEST_METHOD'];
$id = isset($_GET['id']) ? $_GET['id'] : null;

switch ($method) {
    case 'PUT':
        // Update data mahasiswa
        parse_str(file_get_contents("php://input"), $put_data);
        if ($id) {
            $response = $student->update($id, $put_data);
            echo json_encode($response);
        } else {
            echo json_encode(["message" => "Student ID is required"]);
        }
        break;

    case 'DELETE':
        // Hapus data mahasiswa
        if ($id) {
            $response = $student->delete($id);
            echo json_encode($response);
        } else {
            echo json_encode(["message" => "Student ID is required"]);
        }
        break;

    default:
        echo json_encode(["message" => "Method not supported"]);
        break;
};