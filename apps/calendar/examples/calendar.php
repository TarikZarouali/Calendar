<?php
$var['pool'] = array('_', '_', 'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z', 'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', '0', '1', '2', '3', '4', '5', '6', '7', '8', '9');
$var['rand'] = $var['pool'][rand(2, 63)] . $var['pool'][rand(2, 63)] . $var['pool'][rand(2, 63)] . $var['pool'][rand(2, 63)];
$var['rand'];
$var['pool'][rand(2, 63)];
$rand = $var['rand'];

$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'event';

$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

if (!$conn) {
    die("Fout bij de verbinding met de database: " . mysqli_connect_error());
}
$eventData = $_POST;
if (isset($eventData['event'])) {
    $event = json_decode($eventData['event']);
}
if ($eventData['action'] == 'create')  {
    // Decode the JSON string to get the object
    $calendarId = $event->calendarId;
    $title = $event->title;
    $isPrivate = ($event->isPrivate === true) ? 1 : 0;
    $location = $event->location;
    $state = $event->state;
    $isAllDay = ($event->isAllday === true) ? 1 : 0;
    $start = strtotime($event->start->d->d);
    $end = strtotime($event->end->d->d);
    // Assuming $var is an array with a 'rand' key
    $rand = $var['rand'];

    $stmt = $conn->prepare("INSERT INTO event (EventId, calendarId, title, isPrivate, `location`, `state`, isAllDay, `start`, `end`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");

    $stmt->bind_param("sssssssss", $rand, $calendarId, $title, $isPrivate, $location, $state, $isAllDay, $start, $end);

    // execute
    $stmt->execute();

    $stmt->close();
} elseif ($eventData['action'] == 'read') {
    if ($eventData['method'] == 'list') {
        $stmt = $conn->prepare("SELECT EventId, calendarId, title, isPrivate, `location`, `state`, isAllDay, `start`, `end`, `category` FROM event");
        $stmt->execute();
        $result = $stmt->get_result();
        $resultsArray = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $resultsArray[] = $row;
            }
        }
        $jsonResult = json_encode($resultsArray);
        $result->close();
        $stmt->close();
        echo $jsonResult;
    }
} elseif ($eventData['action'] == 'delete') {
    $eventId = $event->id;
    $stmt = $conn->prepare("DELETE FROM event WHERE EventId = ?");
    $stmt->bind_param("s", $eventId);

    if ($stmt->execute()) {
        echo "Event verwijderd";
    } else {
        echo "Fout bij het verwijderen van het event: " . mysqli_error($conn);
    }
    $stmt->close();
} else if ($eventData['action'] == 'update') {
    $events = $event->event;
    // var_dump($event->event->isAllday); exit;
    $eventId = $events->id;
    $calendarId = (isset($event->changes->calendarId) ? $event->changes->calendarId : $events->calendarId);
    $title = (isset($event->changes->title) ? $event->changes->title : $events->title);
    $isPrivate = (isset($event->changes->isPrivate) ? $event->changes->isPrivate : $events->isPrivate);
    $location = (isset($event->changes->location) ? $event->changes->location : $events->location);
    $state = (isset($event->changes->state) ? $event->changes->state : $events->state);
    $isAllday = (isset($event->changes->isAllday) ? $event->changes->isAllday : $events->isAllday);
    $beginDate = (isset($event->changes->start->d->d) ? strtotime($event->changes->start->d->d) : strtotime($events->start->d->d));
    $endDate = (isset($event->changes->end->d->d) ? strtotime($event->changes->end->d->d) : strtotime($events->end->d->d));
    $isPrivate = ($isPrivate === true) ? 1 : 0;
    $isAllday = ($isAllday === true) ? 1 : 0;


    $stmt = $conn->prepare("UPDATE event SET calendarId = ?, title = ?, isPrivate = ?, location = ?, state = ?, isAllday = ?, start = ?, end = ? WHERE EventId = ?");
    $stmt->bind_param(
        "sssssssss",
        $calendarId,
        $title,
        $isPrivate,
        $location,
        $state,
        $isAllday,
        $beginDate,
        $endDate,
        $eventId
    );
    
    if ($stmt->execute()) {
        echo "Event aangepast";
    } else {
        echo "Fout bij het aanpassen van het event: " . mysqli_error($conn);
    }
    $stmt->close();
    
}