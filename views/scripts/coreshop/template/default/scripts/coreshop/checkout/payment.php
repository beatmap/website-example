<div class="container shop checkout checkout-step-5">
    
    <?=$this->partial("coreshop/helper/order-steps.php", array("step" => 5));?>
    
    <div class="summary">
        <?=$this->template("coreshop/cart/helper/cart.php", array("edit" => false));?>
    </div>


    <form action="<?=\CoreShop::getTools()->url(array("act" => "payment", "lang" => $this->language), "coreshop_checkout", true)?>" method="post">
        <div class="panel panel-smart">
            <div class="panel-heading">
                <h3 class="panel-title"><?=$this->translate("Payment")?></h3>
            </div>
            <div class="panel-body payment-options">
                <?php $i = 0; ?>
                <?php foreach($this->provider as $provider) { ?>

                    <table class="table table-unstyled payment-option">

                        <tr>

                            <td class="col-xs-1 payment-option-radio">
                                <input class="delivery_option_radio" type="radio" name="payment_provider" value="<?=$provider->getIdentifier()?>" <?php echo $i === 0 ? 'checked="checked"' : '' ?>>
                            </td>
                            <td class="col-xs-3 payment-option-image">
                                <?php if($provider->getImage()) { ?>
                                    <img src="<?=$provider->getImage()?>" class="img-responsive" alt="<?=$provider->getName()?>">
                                <?php } ?>
                            </td>
                            <td class="payment-option-text">
                                <strong><?=$provider->getName()?></strong> <?=$provider->getDescription()?>
                            </td>
                            <?php
                                $paymentFee = $provider->getPaymentFee($this->cart);

                                if($paymentFee > 0) {
                                    ?>
                                    <td class="payment-option-price"><?=$this->cart->formatPrice($paymentFee);?></td>
                                    <?php
                                }
                                ?>

                        </tr>

                    </table>
                    <?php $i++; ?>
                <?php } ?>


                <div class="row">
                    <div class="col-xs-12">
                        <a href="<?=\CoreShop::getTools()->url(array("lang" => $this->language, "act" => "shipping"), "coreshop_checkout", true)?>" class="btn btn-default pull-left">
                            <?=$this->translate("Back")?>
                        </a>

                        <button type="submit" class="btn btn-white btn-borderd pull-right">
                            <?=$this->translate("Proceed to checkout")?>
                        </button>
                    </div>
                </div>

            </div>
        </div>

    </form>

</div>