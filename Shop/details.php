<?php
if(!isset($_GET['id'])){
    header('location: ./');
}
 ?>
<?php include 'php/include/head.php' ?>
<?php
$prod = $db->prepare('SELECT equipments.*, users.fullname
    FROM equipments
    INNER JOIN users ON users.id = equipments.dj
    WHERE equipments.id = ?');
$prod->execute(array($_GET['id']));
$p = $prod->fetch();
 ?>

<div class="container">
    <?php include '../php/script/orderNow.php'; ?>
</div>

<div class="content details-page">
    <!---start-product-details--->
    <div class="product-details">
        <div class="wrap">
            <ul class="product-head">
                <li><a href="./">Home</a><span>::</span></li>
                <li class="active-page">Product Details</li>
                <div class="clear"> </div>
            </ul>
        <!----details-product-slider--->
        <!-- Include the Etalage files -->
            <link rel="stylesheet" href="css/etalage.css">
            <script src="js/jquery.etalage.min.js"></script>
        <!-- Include the Etalage files -->
        <script>
            jQuery(document).ready(function($){

                $('#etalage').etalage({
                    thumb_image_width: 300,
                    thumb_image_height: 250,
                    source_image_width: 900,
                    source_image_height: 750,
                    show_hint: true,
                    click_callback: function(image_anchor, instance_id){
                        alert('Callback example:\nYou clicked on an image with the anchor: "'+image_anchor+'"\n(in Etalage instance: "'+instance_id+'")');
                    }
                });
                // This is for the dropdown list example:
                $('.dropdownlist').change(function(){
                    etalage_show( $(this).find('option:selected').attr('class') );
                });
            });
        </script>
        <!----//details-product-slider--->
        <div class="details-left">
            <div class="details-left-slider">
                <ul id="etalage">
                    <li>
                        <img class="etalage_thumb_image" src="../images/equip/eq_<?php echo $p['id'] ?>.jpg" />
                        <img class="etalage_source_image" src="../images/equip/eq_<?php echo $p['id'] ?>.jpg" />
                    </li>
                </ul>
            </div>
            <div class="details-left-info">
                <div class="details-right-head">
                <h1><?php echo $p['name'] ?></h1>

                <p class="product-detail-info"><?php echo $p['description'] ?></p>
                <div class="product-more-details">
                    <ul class="price-avl">
                        <li class="price"><label><i id="prix"><?php echo $p['price'] ?></i>Ghc <small>per Day</small></label></li>
                        <div class="clear"> </div>
                    </ul>
                    <?php if (!isset($_SESSION['id'])): ?>
                        <p>Login to order Now</p>
                    <?php endif; ?>
                    <?php if (isset($_SESSION['id'])): ?>
                        <?php
                        $ordersview = $db->prepare('SELECT * FROM orders WHERE pid = ? AND (sd >= NOW() OR ed >= NOW())');
                        $ordersview->execute(array($_GET['id']));
                        $ordercalrem = [];
                        $i = 0;
                        while ($order_view = $ordersview->fetch()) {
                            $label = ($order_view["status"] == "pending") ? 'primary' : 'success';
                            $ordercalrem[$i] = $order_view["sd"];
                            $ordercalrem[++$i] = $order_view["ed"];
                            $i++;
                            // $start_date = new DateTime::createFormatfr
                            // $rent_or_order = ($order_view['order_starting_date']->getTimestamp() <= now) ? '' : '';
                            // echo '<li class="text-center">used from '. $order_view["order_starting_date"] .' to '. $order_view["order_ending_date"] .' <span class="label label-'.$label.'">'. $order_view["order_status"] .'</span></li>';
                        }
                        ?>
                        <script>
                        function fd(date) {
                            var d = new Date(date),
                                month = '' + (d.getMonth() + 1),
                                day = '' + d.getDate(),
                                year = d.getFullYear();

                            if (month.length < 2) month = '0' + month;
                            if (day.length < 2) day = '0' + day;

                            return [year, month, day].join('-');
                        }
                            var listDate = [];
                            <?php for ($i=0; $i < count($ordercalrem) ; $i++) { ?>
                                listDate.push([fd('<?php echo $ordercalrem[$i]; ?>'), fd('<?php echo $ordercalrem[++$i]; ?>')]);
                            <?php } ?>
                            var disabledList = function (listDate)
                            {
                                var _list = [];
                                for(var i = 0; listDate.length > i; i++ )
                                {
                                    var sd = new Date(listDate[i][0]), ed = new Date(listDate[i][1]);
                                    while(sd <= ed)
                                    {
                                        var m = (sd.getMonth() > 8) ? (sd.getMonth() + 1) : '0' + (sd.getMonth() + 1);
                                        var d = (sd.getDate() > 9) ? sd.getDate() : '0' + sd.getDate();
                                        var y = sd.getYear() + 1900;
                                        if(_list.indexOf(m + '-' + d + '-' + y) === -1) _list.push( m + '-' + d + '-' + y);
                                        sd.setDate(sd.getDate() + 1);
                                    }
                                }
                                return _list;
                            }
                            var rent = disabledList(listDate);

                        </script>
                        <script>
                        $( function() {
                        var dateFormat = "mm/dd/yy",
                          from = $( "#from" )
                            .datepicker({
                                beforeShowDay: function(date){
                                    var string = jQuery.datepicker.formatDate('mm-dd-yy', date);
                                    return [ rent.indexOf(string) == -1 ];
                              },
                              defaultDate: "+1w",
                              changeMonth: true
                            })
                            .on( "change", function() {
                              to.datepicker( "option", "minDate", getDate( this ) );
                            }),
                          to = $( "#to" ).datepicker({
                              beforeShowDay: function(date){
                                  var string = jQuery.datepicker.formatDate('mm-dd-yy', date);
                                  return [ rent.indexOf(string) == -1 ];
                            },
                            defaultDate: "+1w",
                            changeMonth: true
                          })
                          .on( "change", function() {
                            from.datepicker( "option", "maxDate", getDate( this ) );
                            var date1 = new Date($( "#from" ).val());
                            var date2 = new Date($( "#to" ).val());
                            var timeDiff = Math.abs(date2.getTime() - date1.getTime());
                            var diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24));
                            $('.duration').val(diffDays + 1);
                            $('.total').text((parseInt($('#prix').text()) * (diffDays + 1)) + 'Ghc');
                          });

                        function getDate( element ) {
                          var date;
                          try {
                            date = $.datepicker.parseDate( dateFormat, element.value );
                          } catch( error ) {
                            date = null;
                          }
                          return date;
                        }
                        } );
                        </script>
                        <form action="details.php?id=<?php echo $_GET['id'] ?>" method="post" class="orderit">
                            <div class="form-group">
                                <label for="">Start Date</label>
                                <input type="text" name="sd" value="" id="from" required class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">End Date</label>
                                <input type="text" name="ed" value="" id="to" required class="form-control">
                            </div>
                            <div class="orderMsg">
                                <div class="alert alert-danger " role="alert">
                                    <p></p>
                                </div>
                            </div>
                            <input type="hidden" name="du" class="duration">
                            <button type="submit" name="orderitnow" class="btn btn-block btn-primary" disabled>Order</button>
                        </form>
                        <h3>Total</h3>
                        <p class="total">0Ghc</p>
                        <script type="text/javascript">
                            jQuery(document).ready(function($) {
                                $('.orderMsg').fadeOut(500);
                                $('.orderit input').change(function(event) {
                                    console.log(new Date());
                                    var inp = $('.orderit input');
                                    var changed = true;
                                    var breaks = false;
                                    var startdate = $(inp[0]).val().replace(/\//g, '-');
                                    var enddate = $(inp[1]).val().replace(/\//g, '-');
                                    var nsd = startdate.split('-');
                                    var today = new Date();
                                    today.setHours(0,0,0,0);
                                    console.log(startdate, today);
                                    for(var i = 0; i < inp.length; i++)
                                    {
                                        if($(inp[i]).val() === '')
                                        {
                                            changed = false;
                                        }
                                    }

                                    for(var i = 0 ; i < rent.length; i++)
                                    {
                                        if(startdate <= rent[i] && enddate >= rent[i])
                                        {
                                            breaks = true;
                                        }
                                    }
                                    if(!breaks)
                                    {
                                        if(changed)
                                        {
                                            if(enddate > startdate)
                                            {
                                                $('.orderMsg p').text('');
                                                $('.orderMsg').fadeOut(500);
                                                $('.orderit button').attr('disabled', false);
                                            }
                                            else if(startdate < today)
                                            {
                                                $('.orderit button').attr('disabled', true);
                                                $('.orderMsg').fadeIn(500);
                                                $('.orderMsg p').text('your starting date must be greater than today');
                                            }
                                            else
                                            {
                                                $('.orderit button').attr('disabled', true);
                                                $('.orderMsg').fadeIn(500);
                                                $('.orderMsg p').text('your starting date must be lower than your ending date check the ');
                                            }
                                        }
                                    }
                                    else
                                    {
                                        $('.orderit button').attr('disabled', true);
                                        $('.orderMsg').fadeIn(500);
                                        $('.orderMsg p').text('you can\'t order during this periode because some has order this banner within this same periode select a continous time check the ');
                                    }
                                    $('.orderit').on('submit', function(e){
                                        // if(breaks || !changed || enddate < startdate)
                                        // {
                                        //     e.preventDefault();
                                        //     // return false;
                                        // }
                                    });
                                });
                            });

                            </script>
                    <?php endif; ?>
                </div>
            </div>
            </div>
            <div class="clear"> </div>
        </div>
        <div class="clear"> </div>
    </div>
    <!----product-rewies---->
    <div class="product-reviwes">
        <div class="wrap">
        <!--vertical Tabs-script-->
        <!---responsive-tabs---->
            <script src="js/easyResponsiveTabs.js" type="text/javascript"></script>
            <script type="text/javascript">
                $(document).ready(function () {
                     $('#horizontalTab').easyResponsiveTabs({
                            type: 'default', //Types: default, vertical, accordion
                            width: 'auto', //auto or any width like 600px
                            fit: true,   // 100% fit in a container
                            closed: 'accordion', // Start closed if in accordion view
                            activate: function(event) { // Callback function if tab is switched
                            var $tab = $(this);
                            var $info = $('#tabInfo');
                            var $name = $('span', $info);
                                $name.text($tab.text());
                                $info.show();
                            }
                        });

                     $('#verticalTab').easyResponsiveTabs({
                            type: 'vertical',
                            width: 'auto',
                            fit: true
                         });
                 });
            </script>
        <!---//responsive-tabs---->
        <!--//vertical Tabs-script-->
        <!--vertical Tabs-->
        <div id="verticalTab">
            <ul class="resp-tabs-list">
                <li>Description</li>
                <li>Orders</li>
            </ul>
            <div class="resp-tabs-container vertical-tabs">
                <div>
                    <h3> Details</h3>
                    <p><?php echo $p['description'] ?></p>
                </div>
                <div>
                    <h3>Orders</h3>
                    <table class="table">
                        <thead>
                            <tr>
                              <th>#</th>
                              <th>Client</th>
                              <th>DJ</th>
                              <th>Start day</th>
                              <th>End day</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $orders = $db->prepare('SELECT orders.sd, orders.ed, users.fullname, orders.pid
                                FROM orders
                                INNER JOIN users ON users.id = orders.uid
                                WHERE pid = ? LIMIT 5');
                            $orders->execute(array($_GET['id']));
                            while ($o = $orders->fetch()) {
                                $dj = $db->prepare('SELECT users.fullname
                                     FROM equipments
                                     INNER JOIN users ON users.id = equipments.dj
                                     WHERE equipments.id = ?');
                                $dj->execute(array($o['pid']));
                                $d = $dj->fetch();
                                ?>
                                <tr>
                                  <th scope="row">1</th>
                                  <td><?php echo $o['fullname'] ?></td>
                                  <td><?php echo $d['fullname'] ?></td>
                                  <td><?php echo $o['sd'] ?></td>
                                  <td><?php echo $o['ed'] ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
    </div>
    <div class="clear"> </div>
    </div>
    </div>
    <div class="clear"> </div>
    <!--//vertical Tabs-->
    <!----//product-rewies---->
    <!---//End-product-details--->
    </div>
</div>
<?php include 'php/include/foot.php' ?>
