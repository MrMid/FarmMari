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
		if (isset($this->params['item'])) trigger_error('Variable $item overwritten in foreach on line 30');
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
                        </div>
                    </div>
                </div>  
            </nav><!-- Navbar end -->
        </header><!-- Header end -->
        
        <section id="services">
            <div class="container">
                <h2>OUR SERVICES</h2>
<?php
		/* line 22 */ $_tmp = $this->global->uiControl->getComponent("search");
		if ($_tmp instanceof Nette\Application\UI\IRenderable) $_tmp->redrawControl(null, false);
		$_tmp->render();
?>
                
                
                </div>
            </div>
<?php
		/* line 27 */ $_tmp = $this->global->uiControl->getComponent("seznam");
		if ($_tmp instanceof Nette\Application\UI\IRenderable) $_tmp->redrawControl(null, false);
		$_tmp->render();
		if (($mujJSON !== null)) {
?>
               
<?php
			$iterations = 0;
			foreach ($mujJSON->data->organic as $item) {
?>
                     <div class="container">
                        <h2> <?php echo LR\Filters::escapeHtmlText($item->snippet->title) /* line 32 */ ?></h2> 
                      </div>
<?php
				$iterations++;
			}
		}
?>
                 frt
           
        </section>
        
        
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
