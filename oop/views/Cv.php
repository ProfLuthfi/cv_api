<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Curriculum Vitae</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" type="image/x-icon" href="uts/images.png">
</head>

<body>
    <?php
    include_once '../config/Database.php';
    include_once '../models/User.php';
    include_once '../models/Sekolah.php';
    include_once '../models/Skill.php';

    $database = new Database();
    $db = $database->getConnection();

    // TD_user 
    $query = new User($db);
    $listuser = $query->getUserId($_GET['id_user'])->fetchAll(PDO::FETCH_ASSOC);
    // var_dump($listuser[0]);
    $user_data = ($listuser[0]);

    // TD_sekolah
    $querysekolah = new sekolah($db);
    $listsekolah = $querysekolah->getSekolahId($_GET['id_user'])->fetchAll(PDO::FETCH_ASSOC);
    // var_dump($listsekolah);
    $user_sekolah = ($listsekolah[0]);

    // TD_skill
    $queryskill = new Skill($db);
    $listskill = $queryskill->getSkillId($_GET['id_skill'])->fetchAll(PDO::FETCH_ASSOC);
    // var_dump($listskill);
    $user_skill = ($listskill[0]);

    ?>
    <div class="container">
        <div class="header">
            <div class="full-name">
                <h1> <?php echo $user_data['fullname']; ?> </h1>
            </div>
            <div class="contact-info">
                <span class="email">Email: </span>
                <span class="email-val"> <?php echo $user_data['email']; ?> </span>
                <span class="separator"></span>
                <span class="phone">Phone: </span>
                <span class="phone-val"> <?php echo $user_data['no_telepon']; ?> </span>
                <span class="separator"></span>
                <span class="job">Job: </span>
                <span class="job-val"> <?php echo $user_data['job']; ?> </span>
            </div>
        </div>
        <div class="details">
            <div class="section">
                <div class="section__title">Sekolah</div>
                <table class="table table-hover custom-class table-striped">
                    <div class="col-md-4">
                        <tr class="table-primary">
                            <th>Sekolah</th>
                            <th>Tahun</th>
                            <th>Jurusan</th>
                        </tr>
                        <?php foreach ($listsekolah as $key => $user_sekolah) { ?>
                            <tr>
                                <td><?php echo $user_sekolah['sekolah']; ?></td>
                                <td><?php echo $user_sekolah['tahun']; ?></td>
                                <td><?php echo $user_sekolah['jurusan']; ?></td>
                            </tr>
                        <?php } ?>
                    </div>
            </div>
            </table>
        </div>
        <div class="details">
            <div class="section">
                <div class="section__title">Skill</div>
                <table class="table table-hover custom-class table-striped">
                    <div class="col-md-4">
                        <tr class="table-primary">
                            <th>Skill</th>
                            <th>Lembaga Pelatihan Kerja</th>
                            <th>Nilai</th>
                        </tr>
                        <?php foreach ($listskill as $key => $user_skill) { ?>
                            <tr>
                                <td><?php echo $user_skill['skill']; ?></td>
                                <td><?php echo $user_skill['lembaga']; ?></td>
                                <td><?php echo $user_skill['nilai']; ?></td>
                            </tr>
                        <?php } ?>
                    </div>
            </div>
            </table>
        </div>
        <div>
            <p class="text-center">Copyright@Luthfi</p>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>

</html>