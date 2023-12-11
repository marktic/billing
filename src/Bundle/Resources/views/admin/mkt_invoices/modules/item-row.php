<?php
$currency = Currencies::instance()->getByCode('RON');
?>
<tr>
    <td>
        <a href="<?php echo $item->getURL(); ?>">
            <?php echo $item->getName(); ?>
        </a>
    </td>
    <td>
        <?php echo $currency->moneyHTMLFormat($item->getTotal()); ?>
    </td>
    <td>
        C: <?php echo _strftime($item->created); ?>
        I: <?php echo _strftime($item->issued); ?>
    </td>
    <td>
        <?php echo $item->getStatus()->getLabelHTML(); ?>
    </td>
</tr>