{modulelinks modname='ExampleModule' type='user'}

<div id='test'>Test div.</div>
{pageaddvar name='javascript' value='jquery'}
<script type="text/javascript">
    jQuery('<p>Text was inserted by jQuery.</p>').insertAfter('#test');
</script>