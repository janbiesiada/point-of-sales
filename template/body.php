<?php
/** @var string $action */
/** @var float $cartTotal */
/** @var string $productCodes */
/** @var string $formattedPrice */
/** @var \Exception[] $errors */

?>

<form method="post" action="<?= $action ?>" id="target">
    <input type="text" name="product_txt" />
    <button type="submit" name="submit" id="process">Submit</button>
</form>
<div class="result">
    <?php if($cartTotal > 0): ?>
        <b>The total cost of: <?= $productCodes ?> is: <?= $formattedPrice ?></b>
    <?php endif; ?>
</div>
<div class="errors">
    <?php foreach ($errors as $error):?>
        <p>Something Went Wrong: <?= $error->getMessage(); ?></p>
    <?php endforeach; ?>
</div>