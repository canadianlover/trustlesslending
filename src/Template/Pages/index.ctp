<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
	<li class="heading"><?= __('Actions') ?></li>
	<?php if($this->Session->read('Auth.User')) { ?>
	<li><?= $this->Html->link(__('View unfunded loans'), ['controller' => 'Loans', 'action' => 'index']) ?></li>
	<li><?= $this->Html->link(__('View funded loans'), ['controller', 'Loans' 'action' => 'index', true]) ?></li>
	<? php } else { ?>
	<li><?= $this->Html->link(__('Login'), ['controller' => 'Users', 'action' => 'login']) ?></li>
	<li><?= $this->Html->link(__('Register'), ['controller' => 'Users', 'action' => 'add']) ?></li>
	<? } ?>
	</ul>

</nav>
<h1><i>Trustless Lending:</i> peer-to-peer Bitcoin lending.</h1>
Trustless Lending is a new Bitcoin lending website that opreates on the principal of not trusting users who take out loans and never pay them back. This website intends to provide all the technical programming needed to prevent scammers from not paying back loans. On this website, all loans are backed up by a collaterial of somekind, such as a domain name. If the collaterial is worth something, easily transferable and liquidizible, your loan will be funded. If you do not pay your loan, your collaterial will be sold.

<p>In the future, if one wanted to take out a loan without collaterial, the users loan will go to a bidding process. The highest bidding investor will fund