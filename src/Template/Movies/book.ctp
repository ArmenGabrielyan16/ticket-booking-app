<div class="row">
    <div class="col-sm-12 col-sm-offset-4">
        <?php
            foreach (range(1, $hall->rows) as $row) {
                echo '<div class="hall-row">';
                foreach (range(1, $hall->seats) as $seat) {
                    $id = $row . '-' . $seat;
                    $booked = false;
                    if ($bookings) {
                        foreach ($bookings as $booking) {
                            if ($booking->row_number == $row && $booking->seat_number == $seat && $booking->inactive == 1) {
                                echo '<button class="btn seat" id="' . $id . '" style="background: red" value="' . $booking->id .'">' . $id . '</button>';
                                $booked = true;
                                break;
                            }
                        }
                    }
                    if (!$booked) {
                        echo '<button class="btn seat" id="' . $id . '">' . $id . '</button>';
                    }
                }
                echo '</div>';
            }
        ?>
    </div>
</div>

<script>
    $(document).ready(function () {
        $('.seat').click(function(event) {
            $.post('<?= $this->Url->build(["controller" => "Movies", "action" => "book", $hallId, $movieId]); ?>',
                {
                    row_seat: event.target.id,
                    booking_id: $(this).val()
                }
            );
        });
        function update() {
            $.ajax({
                url: '<?= $this->Url->build(["controller" => "Movies", "action" => "update", $hallId, $movieId]); ?>',
                cache: false,
                success: function(bookings){
                for (var i = 0;i < bookings.length;i++) {
                    $booking = $('#' + bookings[i]['row'] + '-' + bookings[i]['seat']);
                        if ($booking['inactive'] ==  0) {
                            $booking.css({'background': 'red'});
                            $booking.val(bookings[i]['id'])
                        } else {
                            $booking.css({'background': 'white'});
                        }
                }
                }
            });
        }
        setInterval (update, 2500);
    });
</script>
<style>
    .seat {
        width: 45px;
        height: 45px;
        background: #fff;
        border: 1px solid #000;
        float: left;
        margin-right: -1px;
        margin-top: -1px;
        padding: 0;
        text-align: center;
    }
    .hall-row:after {
        clear: both;
        content: "";
        display: table;
    }
</style>