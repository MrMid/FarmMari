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
		if (isset($this->params['item'])) trigger_error('Variable $item overwritten in foreach on line 36');
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
                            <input type="text" class="form-control" placeholder="Search">
                             <span class="input-group-addon"><i class="fa fa-search"></i></span> 
                            <?php
		/* line 14 */
		echo Nette\Bridges\FormsLatte\Runtime::renderFormBegin($form = $_form = $this->global->formsStack[] = $this->global->uiControl["search"], ['role'=>"form"]);
?>

                                <?php echo end($this->global->formsStack)["query"]->getControl()->addAttributes(['class'=>"form-control", 'placeholder'=>"Search"]) /* line 15 */ ?>

            					<?php echo end($this->global->formsStack)["search"]->getControl()->addAttributes(['class'=>'tlacitkoSearch']) /* line 16 */ ?>


                            <?php
		echo Nette\Bridges\FormsLatte\Runtime::renderFormEnd(array_pop($this->global->formsStack));
?>

                        </div>
                    </div>
                </div>  
            </nav><!-- Navbar end -->
        </header><!-- Header end -->
        
        <section id="services">
            <div class="container">
                <h2>OUR SERVICES</h2>
<?php
		/* line 28 */ $_tmp = $this->global->uiControl->getComponent("search");
		if ($_tmp instanceof Nette\Application\UI\IRenderable) $_tmp->redrawControl(null, false);
		$_tmp->render();
?>
                
                
                </div>
            </div>
            
<?php
		if (($json !== null)) {
?>

<?php
			$iterations = 0;
			foreach ($json->data->organic as $item) {
?>
                     <div class="container">
                        <h2> <?php echo LR\Filters::escapeHtmlText($item->snippet->title) /* line 38 */ ?></h2> 
                      </div>
<?php
				$iterations++;
			}
		}
?>
                 frt
            
           
        </section>
        
        
        

                  
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
          
          
           <div class="zaznam">
		        <a href="#"><p class="title">Zeman poblahopřál Drahošovi: Je to to cena útěchy …</p></a>
				<a href="#"><p class="url">https://www.novinky.cz/domaci/485359-zeman-poblahopral-drahosovi-je-to-cena-utechy.html</p></a>	
		        <p class="description">Přízviska Miloše Zemana se během let různila: muž, který pozvedl ČSSD ze dna, pragmatický premiér, vulgární premiér, unavený premiér, neúspěšný kandidát na prezidenta, zatrpklý důchodce z Vysočiny.</p>
		    </div>

           <div class="zaznam">
                <a href="#"><p class="title">Zeman poblahopřál Drahošovi: Je to to cena útěchy …</p></a>
                <a href="#"><p class="url">https://www.novinky.cz/domaci/485359-zeman-poblahopral-drahosovi-je-to-cena-utechy.html</p></a>  
                <p class="description">Přízviska Miloše Zemana se během let různila: muž, který pozvedl ČSSD ze dna, pragmatický premiér, vulgární premiér, unavený premiér, neúspěšný kandidát na prezidenta, zatrpklý důchodce z Vysočiny.</p>
            </div>
                       <div class="zaznam">
                <a href="#"><p class="title">Zeman poblahopřál Drahošovi: Je to to cena útěchy …</p></a>
                <a href="#"><p class="url">https://www.novinky.cz/domaci/485359-zeman-poblahopral-drahosovi-je-to-cena-utechy.html</p></a>  
                <p class="description">Přízviska Miloše Zemana se během let různila: muž, který pozvedl ČSSD ze dna, pragmatický premiér, vulgární premiér, unavený premiér, neúspěšný kandidát na prezidenta, zatrpklý důchodce z Vysočiny.</p>
            </div>
                       <div class="zaznam">
                <a href="#"><p class="title">Zeman poblahopřál Drahošovi: Je to to cena útěchy …</p></a>
                <a href="#"><p class="url">https://www.novinky.cz/domaci/485359-zeman-poblahopral-drahosovi-je-to-cena-utechy.html</p></a>  
                <p class="description">Přízviska Miloše Zemana se během let různila: muž, který pozvedl ČSSD ze dna, pragmatický premiér, vulgární premiér, unavený premiér, neúspěšný kandidát na prezidenta, zatrpklý důchodce z Vysočiny.</p>
            </div>
                       <div class="zaznam">
                <a href="#"><p class="title">Zeman poblahopřál Drahošovi: Je to to cena útěchy …</p></a>
                <a href="#"><p class="url">https://www.novinky.cz/domaci/485359-zeman-poblahopral-drahosovi-je-to-cena-utechy.html</p></a>  
                <p class="description">Přízviska Miloše Zemana se během let různila: muž, který pozvedl ČSSD ze dna, pragmatický premiér, vulgární premiér, unavený premiér, neúspěšný kandidát na prezidenta, zatrpklý důchodce z Vysočiny.</p>
            </div>

           <div class="zaznam">
                <a href="#"><p class="title">Zeman poblahopřál Drahošovi: Je to to cena útěchy …</p></a>
                <a href="#"><p class="url">https://www.novinky.cz/domaci/485359-zeman-poblahopral-drahosovi-je-to-cena-utechy.html</p></a>  
                <p class="description">Přízviska Miloše Zemana se během let různila: muž, který pozvedl ČSSD ze dna, pragmatický premiér, vulgární premiér, unavený premiér, neúspěšný kandidát na prezidenta, zatrpklý důchodce z Vysočiny.</p>
            </div>
                        		    
		    <div class="zaznam">
		        <a href="#"><p class="title">Zeman odkládá cesty. Prezident oproti plánům nepojede do …</p></a>
				<a href="#"><p class="url">https://www.kupi.cz/letaky/zeman-maso-uzeniny</p></a>	
		        <p class="description">Ve Varšavě si včera dala schůzku neformální skupina devíti hlav států zemí střední a východní Evropy. Do polské metropole se jich ovšem sjelo jen osm – jako jediný chyběl český prezident Miloš Zeman, který za sebe poslal náhradu v podobě …</p>
		    </div>
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
