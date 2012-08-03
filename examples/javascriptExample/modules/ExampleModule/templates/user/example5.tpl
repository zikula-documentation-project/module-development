{modulelinks modname='ExampleModule' type='user'}

<div id='test'>Test div.</div>
{pageaddvar name='javascript' value='prototype'}
<script type="text/javascript">
    var newElement = new Element( 'p' );
    newElement.update('Text was inserted by Prototype.');
    $('test').insert ({'after': newElement} );
</script>