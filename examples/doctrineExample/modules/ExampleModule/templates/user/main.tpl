<h3>{gt text='List of all persons'}</h3>

<p>
    <a href="{modurl modname="ExampleModule" type="user" func="edit"}">{gt text='Add person'}</a>
</p>

{insert name="getstatusmsg"}

<table class="z-datatable">
    <thead>
    <tr>
        <th>{gt text='Name'}</th>
        <th>{gt text='Actions'}</th>
    </tr>
    </thead>
    <tbody>
    {foreach from=$persons item='person'}
    <tr class="{cycle values='z-odd,z-even'}">
        <td>{$person.name}</td>
        <td><a href="{modurl modname='ExampleModule' type='user' func='edit' id=$person.id}">Edit</td>
    </tr>
        {foreachelse}
    <tr class="{cycle values="z-odd,z-even"}">
        <td colspan=2>{gt text='No entires available!'}</td>
    </tr>
    {/foreach}
    </thead>
</table>