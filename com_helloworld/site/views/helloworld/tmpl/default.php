<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
?>
<?php /*foreach ($this->items as $i => $item) {


*/?><!--
<div class="fixed-rectangle">
        <?php /*echo $item->title; */?>
        <i class="triangle-topright pull-right"></i>
    <div class="event-text">
    <p>Evenement 1</p>
    <p>Datum: 27-09-17</p>
    <button type="button" class="btn btn-default" data-dismiss="modal">Meer info..</button>
    </div>
</div>
--><?php
/*
}
*/?>

<?php if(empty($this->items)) {
    echo "leeg items";
}
else{
    foreach($this->items as $i => $item){
        echo $item->title;
    }
}
?>
<style>

    .triangle-topright {
        border-top: 50px solid red;
        border-left: 50px solid transparent;
    }
    .fixed-rectangle {
        background-color: #ffffff;
        border: 1px solid #dadada;
    }
    .event-text{
        font-size: 18px;
        margin: 15px 0px 15px 18px;
    }
</style>

