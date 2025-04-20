<?php
class Hostel {
    private $rooms = [];

    public function __construct() {
        // Sample data
        $this->rooms = [
            ['id' => 1, 'type' => 'Single', 'price' => 50, 'available' => true],
            ['id' => 2, 'type' => 'Double', 'price' => 75, 'available' => true],
            ['id' => 3, 'type' => 'Dormitory', 'price' => 30, 'available' => false],
        ];
    }

    public function getRooms() {
        return $this->rooms;
    }

    public function bookRoom($id) {
        foreach ($this->rooms as &$room) {
            if ($room['id'] == $id && $room['available']) {
                $room['available'] = false; // Mark as booked
                return true;
            }
        }
        return false; // Room not available
    }
}
?>
