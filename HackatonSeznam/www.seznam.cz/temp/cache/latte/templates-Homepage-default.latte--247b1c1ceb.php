<?php
// source: C:\xampp\htdocs\hackaton\FarmMari\HackatonSeznam\www.seznam.cz\app\presenters/templates/Homepage/default.latte

use Latte\Runtime as LR;

class Template247b1c1ceb extends Latte\Runtime\Template
{
	public $blocks = [
		'content' => 'blockContent',
	];

	public $blockTypes = [
		'content' => 'html',
	];


	function main()
	{
		extract($this->params);
		if ($this->getParentName()) return get_defined_vars();
		$this->renderBlock('content', get_defined_vars());
		return get_defined_vars();
	}


	function prepare()
	{
		extract($this->params);
		if (isset($this->params['item'])) trigger_error('Variable $item overwritten in foreach on line 50');
		Nette\Bridges\ApplicationLatte\UIRuntime::initialize($this, $this->parentName, $this->blocks);
		
	}


	function blockContent($_args)
	{
		extract($_args);
?>

<!-- Header -->
        <header>
            <!-- Navbar -->
            <nav class="navbar bootsnav">
                <!-- Top Search -->
                <div class="top-search">
                    <div class="container">
                        <div class="input-group">
                            
                             <span class="input-group-addon"><i class="fa fa-search"></i></span> 
                            <?php
		/* line 13 */
		echo Nette\Bridges\FormsLatte\Runtime::renderFormBegin($form = $_form = $this->global->formsStack[] = $this->global->uiControl["search"], ['role'=>"form"]);
?>

                                <?php echo end($this->global->formsStack)["query"]->getControl()->addAttributes(['class'=>"form-control", 'placeholder'=>"Search"]) /* line 14 */ ?>

            					<?php echo end($this->global->formsStack)["search"]->getControl()->addAttributes(['class'=>'tlacitkoSearch']) /* line 15 */ ?>


                            <?php
		echo Nette\Bridges\FormsLatte\Runtime::renderFormEnd(array_pop($this->global->formsStack));
?>

                        </div>
                    </div>
                </div>  
            </nav><!-- Navbar end -->
        </header><!-- Header end -->        

                  
          <div class="container">
          
  	<div>
	    <div id="stack-bubble-block">
	    </div>
	
	    <div id="pes-bubble">
	
	        <div class="post-text" itemprop="text">
	                <p>You mean</p>
	                
	                <pre class="lang-php prettyprint prettyprinted"><code><span class="kwd">if</span><span class="pln"> </span><span class="pun">(</span><span class="pln">isset</span><span class="pun">(</span><span class="pln">$_POST</span><span class="pun">[</span><span class="str">'sms_code'</span><span class="pun">])</span><span class="pln"> </span><span class="pun">==</span><span class="pln"> TRUE </span><span class="pun">)</span><span class="pln"> </span><span class="pun"></span></code>dfffffffffffffffffffffffffffffffffffffffffffffffffff</pre>
	                
	                <p>though incidentally you really mean</p>
	                
	                <pre class="lang-php prettyprint prettyprinted"><code><span class="kwd">if</span><span class="pun">(</span><span class="pln">isset</span><span class="pun">(</span><span class="pln">$_POST</span><span class="pun">[</span><span class="str">'sms_code'</span><span class="pun">]))</span><span class="pln"> </span><span class="pun"></span></code></pre>
            </div>
	        
	         
	    </div>
	</div>
          
          
<?php
		if ((isset($json) &&$json !== null)) {
?>

<?php
			$iterations = 0;
			foreach ($json->data->organic as $item) {
?>
                      <div class="zaznam">
                                  
                            <a href="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($item->snippet->url)) /* line 53 */ ?>"><p class="title"><?php
				echo LR\Filters::escapeHtmlText(preg_replace('/<\/?[^>]+>/', '', $item->snippet->title)) /* line 53 */ ?></p></a>
                        <a href="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($item->snippet->url)) /* line 54 */ ?>"><p class="url"><?php
				echo LR\Filters::escapeHtmlText(preg_replace('/<\/?[^>]+>/', '', $item->snippet->url)) /* line 54 */ ?></p></a>	
                        <p class="description"><?php echo LR\Filters::escapeHtmlText(preg_replace('/<\/?[^>]+>/', '', $item->snippet->description)) /* line 55 */ ?></p>
		             </div>
<?php
				$iterations++;
			}
		}
?>
        </div>                                          

        

                <!-- Footer -->
        <footer>
            <!-- Footer bottom -->
            <div class="footer_bottom text-center">
                <p class="wow fadeInRight">
                    Tým Farmáři.
                </p>
            </div><!-- Footer bottom end -->
        </footer><!-- Footer end -->
<?php
	}

}
