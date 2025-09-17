<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>MagLaboratory Email</title>
</head>
<body style="height:100%;width:100%;" bgcolor="#f6f6f6">
<table style="width:100%;padding:20px;">
<tr>
<td></td>
<td class="container" style="clear: both !important; display: block !important; max-width: 600px !important; margin: 0 auto; padding: 20px; border: 1px solid #efefef;" bgcolor="#fafafa">
<div style="display:block;max-width:600px;margin: 0 auto;">
<table style="width:100%;" bgcolor="#fafafa">
<?php if($email_logo) { ?>
<tr>
<td>
<img <?php echo MtHaml\Runtime::renderAttributes(array(array('src', ('http://www.maglaboratory.org/images/email-logo.webp')), array('alt', ('MAG Laboratory Logo'))), 'html5', 'UTF-8'); ?>>
</td>
</tr>
<?php } ?>
<tr>
<td>
<h1>Your Job Board Posting</h1>
<p>
Here's the link to edit your job board posting. Don't share it with anyone (unless you want them to be able to edit and delete the posting).
</p>
<p>
<a <?php echo MtHaml\Runtime::renderAttributes(array(array('href', (ROOT_URL . '/jobs/' . ($listing['id']) . '/edit/' . ($listing['edit_code'])))), 'html5', 'UTF-8'); ?>><?php echo htmlspecialchars("#{ROOT_URL}/jobs/#{$listing['id']}/edit/#{$listing['edit_code']}",ENT_QUOTES,'UTF-8'); ?></a>
</p>
<p>
Thanks for making the posting!
</p>
<p>
Makers, Artists and Gadgeteers Laboratory is a non-profit organization that relies on donations to operate. If you find this job board useful, please consider making a donation. It is completely optional, but any amount is appreciated.
<a href="https://www.maglaboratory.org/donate">Click here to donate with Paypal</a>
</p>

</td>
</tr>
<?php if($extra_rows) { ?>
<?php echo htmlspecialchars($extra_rows,ENT_QUOTES,'UTF-8'); ?>
<?php } ?>
</table>
</div>
</td>
</tr>
</table>
<table style="clear: both !important; width:100%;">
<tr>
<td></td>
<div style="display: block; max-width: 600px;margin:0 auto;">
<table style="width: 100%;">
<tr>
<td align="center">
<?php if($footer_content) { ?>
<?php echo htmlspecialchars($footer_content,ENT_QUOTES,'UTF-8'); ?>
<?php } ?>
</td>
</tr>
</table>
</div>
</tr>
</table>
</body>
</html>
