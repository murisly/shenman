<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/7/17
 * Time: 15:41
 */

use yii\jui\DatePicker;

?>


<?= DatePicker::widget(['name' => 'date']) ?>



<!--查询面板-->
<div class="panel panel-default">
    <div class="panel-body">
        <form class="form-inline" method="get">
            <div class="form-group">
                <label for="currencyCategory">时段:</label>
                <input id="date-from" name="dateFrom" class="form-control" type="text" value="<?=$queryForm->dateFrom?>">
                <input id="date-to" name="dateTo" class="form-control" type="text" value="<?=$queryForm->dateTo?>">
            </div>
            <button type="submit" class="btn btn-primary">查询</button>
        </form>
    </div>
</div>


<script>

    $(function() {
        $( "#date-from" ).datepicker({
            defaultDate: "+1w",
            changeMonth: true,
            numberOfMonths: 1,
            dateFormat: 'yy-mm-dd',
            onClose: function( selectedDate ) {
                $( "#date-to" ).datepicker( "option", "minDate", selectedDate );
            }
        });
        $( "#date-to" ).datepicker({
            defaultDate: "+1w",
            changeMonth: true,
            numberOfMonths: 1,
            dateFormat: 'yy-mm-dd',
            onClose: function( selectedDate ) {
                $( "#date-from" ).datepicker( "option", "maxDate", selectedDate );
            }
        });
    });

</script>