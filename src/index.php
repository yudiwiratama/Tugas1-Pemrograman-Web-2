<?php
// Konfigurasi koneksi database
$dbConfig = [
    'host' => 'mysql',
    'username' => 'root',
    'password' => 'unsia',
    'database' => 'unsia',
    'port' => 3306
];

// Fungsi untuk mendapatkan koneksi database
function getDatabaseConnection($config) {
    try {
        $dsn = "mysql:host={$config['host']};dbname={$config['database']};port={$config['port']}";
        $connection = new PDO($dsn, $config['username'], $config['password']);
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $connection;
    } catch (PDOException $e) {
        die("Koneksi database gagal: " . $e->getMessage());
    }
}

// Fungsi untuk mengambil data mahasiswa
function fetchStudentData($connection) {
    $stmt = $connection->query("SELECT * FROM mahasiswa ORDER BY nama ASC");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Main execution
$dbConnection = getDatabaseConnection($dbConfig);
$students = fetchStudentData($dbConnection);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Mahasiswa</title>
    <style>
        :root {
            --primary-color: #3498db;
            --secondary-color: #2980b9;
            --light-gray: #f8f9fa;
            --dark-gray: #343a40;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f5f5f5;
            margin: 0;
            padding: 20px;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        
        h1 {
            color: var(--dark-gray);
            text-align: center;
            margin-bottom: 30px;
            padding-bottom: 10px;
            border-bottom: 2px solid var(--primary-color);
        }
        
        .student-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        
        .student-table th {
            background-color: var(--primary-color);
            color: white;
            padding: 12px;
            text-align: left;
        }
        
        .student-table td {
            padding: 10px 12px;
            border-bottom: 1px solid #ddd;
        }
        
        .student-table tr:nth-child(even) {
            background-color: var(--light-gray);
        }
        
        .student-table tr:hover {
            background-color: #e9e9e9;
        }
        
        .gender-badge {
            display: inline-block;
            padding: 3px 8px;
            border-radius: 12px;
            font-size: 0.8em;
            font-weight: bold;
        }
        
        .male {
            background-color: #d4e6f1;
            color: #2980b9;
        }
        
        .female {
            background-color: #fadbd8;
            color: #c0392b;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Daftar Mahasiswa</h1>
        
        <table class="student-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NIM</th>
                    <th>Nama Lengkap</th>
                    <th>Jenis Kelamin</th>
                    <th>Kelas</th>
                    <th>Program Studi</th>
                    <th>Angkatan</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($students as $student): ?>
                <tr>
                    <td><?= htmlspecialchars($student['id']) ?></td>
                    <td><?= htmlspecialchars($student['nim']) ?></td>
                    <td><?= htmlspecialchars($student['nama']) ?></td>
                    <td>
                        <span class="gender-badge <?= $student['jenis_kelamin'] === 'L' ? 'male' : 'female' ?>">
                            <?= $student['jenis_kelamin'] === 'L' ? 'Laki-laki' : 'Perempuan' ?>
                        </span>
                    </td>
                    <td><?= htmlspecialchars($student['kelas']) ?></td>
                    <td><?= htmlspecialchars($student['program_studi']) ?></td>
                    <td><?= htmlspecialchars($student['angkatan']) ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
