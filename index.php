<?php 
    include_once("src/templates/header.php");
    require_once 'config/Database.php';
    $db = new Database();
    $query = "SELECT c.*, l.* FROM clientes c
              LEFT JOIN locations l ON c.location_id = l.id";
    $stmt = $db->pdo->prepare($query);
    $stmt->execute();
    $clientsWithLocations = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="main-container">
    <div class="scrollable-container">
        <div class="container">
            <?php if(count($clientsWithLocations) > 0): ?>
                <ul>
                    <?php foreach($clientsWithLocations as $client): ?>
                        <?php $name = json_decode($client['name'], true); ?>
                        <?php $picture = json_decode($client['picture'], true); ?>
                        <?php $street = json_decode($client['street'], true); ?>
                        <?php $login = json_decode($client['login'], true); ?>
                        <?php $dob = json_decode($client['dob'], true); ?>
                        <?php $registered = json_decode($client['registered'], true); ?>
                        <?php $coordinates = json_decode($client['coordinates'], true); ?>
                        <?php $timezone = json_decode($client['timezone'], true); ?>
                        <li>
                            <img src="<?= $picture['medium']; ?>" alt="User Picture">
                            <p><strong>Name:</strong> <?= $name['first']; ?> <?= $name['last']; ?></p>
                            <p><strong>Phone:</strong> <?= $client['phone']; ?></p>
                            <p><strong>Email:</strong> <?= $client['email']; ?></p>
                            <p><strong>Location:</strong> <?= $street['name']; ?>, <?= $client['city']; ?>, <?= $client['state']; ?>, <?= $client['country']; ?></p>
                            <p><strong>Gender:</strong> <?= $client['gender']; ?></p>
                            <p><strong>Date of Birth:</strong> <?= $dob['date']; ?></p>
                            <p><strong>Registered:</strong> <?= $registered['date']; ?></p>
                            <p><strong>Login:</strong> Username: <?= $login['username']; ?></p>
                            <p><strong>Nationality:</strong> <?= $client['nat']; ?></p>
                            <p><strong>Coordinates:</strong> Latitude: <?= $coordinates['latitude']; ?>, Longitude: <?= $coordinates['longitude']; ?></p>
                            <p><strong>Timezone:</strong> Offset: <?= $timezone['offset']; ?>, Description: <?= $timezone['description']; ?></p>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php else: ?>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php require_once "src/templates/footer.php" ?>
