# Short Code Meta

ShortCodeMeta allow you to add meat in head for
- Empty page (`noindex, nofollow`)
- Pagination link

## Installation

### Manually

* Copy the module into ```<thelia_root>/local/modules/``` directory and be sure that the name of the module is ShortCodeMeta.
* Activate it in your thelia administration panel

### Composer

Add it in your main thelia composer.json file

```
composer require thelia/short-code-meta-module:~1.0
```

## Usage

This module use ShortCode (https://github.com/thelia-modules/ShortCode) to add metas in head after smarty has completly build the page.  
The short codes are automatically added in templates with the hook `main.head-bottom` so be sure you have this hook in your template layout.

### Empty pages

To add a meta `noindex, nofollow` to an empty page you have to inform the module with the smarty tag `{set_empty_page_meta}`  
All the page where this tag is present will have a noindex meta.  
For example if you use a loop product in your category page you can add this tag in your elseloop like this :
```
    {ifloop rel="product_list"}
        <div class="row">
            {loop type="product" name="product_list" category=$category_id}
                <p>{$TITLE}
            {/loop}
        </div>
    {/ifloop}
    {elseloop rel="product_list"}
        {set_empty_page_meta}
    {/elseloop}
``` 
With this, all categories page without products will not be indexed by robots.


### Pagination meta link

To add a `<link rel="prev" href="http://url_of_prev_page>` or `<link rel="next" href="http://url_of_next_page>` in your head you just have to add the smarty tag with the good url :  
`{set_prev_page_meta_link url={$url}}` for the prev link  
`{set_next_page_meta_link url={$url}}` for the next link  



