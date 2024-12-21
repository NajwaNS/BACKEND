// TODO 3: Import data students dari folder data/students.js
const students = require('./data/students.js');

// Membuat Class StudentController
class StudentController {
  index(req, res) {
    // TODO 4: Tampilkan data students
    res.status(200).json({
      message: "Daftar students",
      data: students,
    });
  }

  store(req, res) {
    // TODO 5: Tambahkan data students
    const { id, name, age, grade, major } = req.body;
    const newStudent = { id, name, age, grade, major };
    students.push(newStudent);
    res.status(201).json({
      message: "Student berhasil ditambahkan",
      data: newStudent,
    });
  }

  update(req, res) {
    // TODO 6: Update data students
    const { id } = req.params;
    const { name, age, grade, major } = req.body;

    const student = students.find((s) => s.id === parseInt(id));
    if (!student) {
      return res.status(404).json({
        message: "Student tidak ditemukan",
      });
    }

    student.name = name || student.name;
    student.age = age || student.age;
    student.grade = grade || student.grade;
    student.major = major || student.major;

    res.status(200).json({
      message: "Student berhasil diupdate",
      data: student,
    });
  }

  destroy(req, res) {
    // TODO 7: Hapus data students
    const { id } = req.params;

    const studentIndex = students.findIndex((s) => s.id === parseInt(id));
    if (studentIndex === -1) {
      return res.status(404).json({
        message: "Student tidak ditemukan",
      });
    }

    const deletedStudent = students.splice(studentIndex, 1);
    res.status(200).json({
      message: "Student berhasil dihapus",
      data: deletedStudent[0],
    });
  }
}

// Membuat object StudentController
const object = new StudentController();

// Export object StudentController
module.exports = object;
