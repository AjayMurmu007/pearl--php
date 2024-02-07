<div id="booking" class="booking-area p-relative">
    <div class="container">
        <form action="room_list.php" class="contact-form" method="POST">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <ul>
                        <li>
                            <div class="contact-field p-relative c-name">
                                <label><i class="fal fa-badge-check"></i> Check In Date</label>
                                <input type="date" id="in" name="check_in" required>
                            </div>
                        </li>
                        <li>
                            <div class="contact-field p-relative c-name">
                                <label><i class="fal fa-times-octagon"></i> Check Out Date</label>
                                <input type="date" id="out" name="check_out" required>
                            </div>
                        </li>
                        <li>
                            <div class="contact-field p-relative c-name">
                                <label><i class="fal fa-users"></i> Adults</label>
                                <select name="adults" id="adu" required>
                                    <option value="sports-massage">Adults</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>
                        </li>
                        <li>
                            <div class="contact-field p-relative c-name">
                                <label><i class="fal fa-baby"></i> Child</label>
                                <select name="child" id="cld">
                                    <option value="sports-massage">Child</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>
                        </li>
                        <li>
                            <div class="contact-field p-relative c-name">
                                <label><i class="fal fa-concierge-bell"></i> Room</label>
                                <select name="room" id="rm">
                                    <option value="sports-massage">Room</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>
                        </li>

                        <li>
                            <div class="slider-btn">
                                <label><i class="fal fa-calendar-alt"></i></label>
                                <button type="submit" name="room_book" class="btn ss-btn" data-animation="fadeInRight" data-delay=".8s">Check Availability</button>
                            </div>
                        </li>
                    </ul>
                </div>

            </div>

        </form>
    </div>
</div>

<!-- Previous Date Hide -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<script>
    $(function() {
        var dtToday = new Date();
        var month = dtToday.getMonth() + 1;
        var day = dtToday.getDate();
        var year = dtToday.getFullYear();
        if (month < 10)
            month = '0' + month.toString();
        if (day < 10)
            day = '0' + day.toString();

        var minDate = year + '-' + month + '-' + day;

        $('#in').attr('min', minDate);
    });

    $(function() {
        var dtToday = new Date();
        var month = dtToday.getMonth() + 1;
        var day = dtToday.getDate();
        var year = dtToday.getFullYear();
        if (month < 10)
            month = '0' + month.toString();
        if (day < 10)
            day = '0' + day.toString();

        var minDate = year + '-' + month + '-' + day;

        $('#out').attr('min', minDate);
    });
</script>
