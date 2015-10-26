<h1>Outstanding loans for <? $this->Text->insert($user); ?></h1>
<section>
<table width="600" height="400">
<tr><th><b>Lender</b></th><th><b>Amount owed</b></th><th><b>Date</b></th><th><b>Due by</b></th></tr>
<? foreach ($results as $record): ?>
<tr><td><? $this->Text->insert($record->lender); ?></td></tr>
<? endforeach; ?>
</table>
</section>


