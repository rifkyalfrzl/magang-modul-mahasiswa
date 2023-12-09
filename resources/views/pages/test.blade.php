
<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "laravel";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $job_id = htmlspecialchars($_GET['id']);
    $job_id = $conn->real_escape_string($job_id);
} else {
    die("Parameter 'id' tidak ditemukan atau kosong");
}

$sql = "SELECT * FROM job_table WHERE id = $job_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();

    echo '<div class="header-section">';
    echo '<img src="' . $row['gambar'] . '" alt="Gambar Lowongan">';
    echo '<div class="job-info">';
    echo '<h2>' . $row['judul'] . '</h2>';
    echo '<p>' . $row['nama_perusahaan'] . '</p>';
    echo '<p>' . $row['lokasi'] . '</p>';
    echo '</div></div>';

    // Tampilkan bagian Job Overview
    echo '<div class="info-boxes">';
    echo '<div class="info-box">';
    echo '<h3>Job Overview</h3>';
    echo '<div class="job-overview">';
    echo '<div class="left-section">';
    echo '<p>Posted Date: ' . $row['created_at'] . '</p>';
    echo '<p>Location: ' . $row['lokasi'] . '</p>';
    echo '<p>Job Nature: ' . $row['job_tipe'] . '</p>';
    echo '</div>';
    echo '<div class="right-section">';
    echo '<p>Salary: ' . $row['salary'] . '</p>';
    echo '<p>Application Deadline: ' . $row['tgl_batas_akhir'] . '</p>';
    echo '</div></div></div>';

    // Tampilkan bagian Company Information
    echo '<div class="info-box">';
    echo '<h3>Company Information</h3>';
    echo '<p>Nama Perusahaan: ' . $row['info_nama_perusahaan'] . '</p>';
    echo '<p>Website: ' . $row['situs_web'] . '</p>';
    echo '<p>Email: ' . $row['email'] . '</p>';
    echo '</div></div>';

    // Tampilkan bagian Job Description
    echo '<div class="job-desc">';
    echo '<h3>Job Description</h3>';
    echo '<p>' . $row['job_desc'] . '</p>';
    echo '</div>';

    // Tampilkan bagian Required Skill dan Apply Button
    echo '<div class="apply-section">';
    echo '<div class="required-skill">';
    echo '<h3>Required Skill</h3>';
    echo '<ul>';
    $required_skills = explode(',', $row['required_skill']);
    foreach ($required_skills as $skill) {
        echo '<li>' . $skill . '</li>';
    }
    echo '</ul>';
    echo '</div>';
    echo '<a href="#" class="apply-button">Upload CV & Apply</a>';
    echo '</div>';
} else {
    echo "Lowongan tidak ditemukan";
}
$conn->close();
?>