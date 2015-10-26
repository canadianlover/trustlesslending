<h1>Take out a new loan.</h1>
You are about to take out a new Loan. Please read all the agreements to take out this loan. <b>Do <i><u>not</u></i></b> ignore! The lender will acquire your collaterial through the escrow service provided by this website. <b>If you default on your loan your collaterial will be sold.</b>.<!-- <p>If you choose not to use collaterial, your loan request will be put up to bid from investors. Depending on the information provided, the interest on your interest rate will decrease. If you have good collaterial that is easily obtainable, such as a <i>Steam</i> sccount, bidders will bid high and your interest rate will drop.</p>
<p>
at least 5 bids must be placed on your loan before it can be funded.
</p>
-->
<?php
    echo $this->Form->create();
	echo $this->Form->input('amount');
    echo $this->Form->input('reason');
    echo $this->Form->input('collaterial_id', ['type' => 'select', 'options' => array($collaterial)]);
    echo $this->Form->button(__('Make Request'));
    echo $this->Form->end();
?>
