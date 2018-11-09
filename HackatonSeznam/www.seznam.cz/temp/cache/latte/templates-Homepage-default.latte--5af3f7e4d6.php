<?php
// source: C:\wamp64\www\FarmMari\HackatonSeznam\www.seznam.cz\app\presenters/templates/Homepage/default.latte

use Latte\Runtime as LR;

class Template5af3f7e4d6 extends Latte\Runtime\Template
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
		Nette\Bridges\ApplicationLatte\UIRuntime::initialize($this, $this->parentName, $this->blocks);
		
	}


	function blockContent($_args)
	{
?><!-- Services -->
        <section id="services">
            <div class="container">
                <h2>OUR SERVICES</h2>
                <div class="row">
                    <div class="col-md-4">
                        <div class="service_item">
                            <img src="images/service_img1.jpg" alt="Our Services">
                            <h3>CONSTRUCTION MANAGEMENT</h3>
                            <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit,</p>
                            <a href="#services" class="btn know_btn">know more</a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="service_item">
                            <img src="images/service_img2.jpg" alt="Our Services">
                            <h3>RENOVATION</h3>
                            <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit,</p>
                            <a href="#services" class="btn know_btn">know more</a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="service_item">
                            <img src="images/service_img3.jpg" alt="Our Services">
                            <h3>ARCHITECTURE</h3>
                            <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit,</p>
                            <a href="#services" class="btn know_btn">know more</a>
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- Services end -->
<?php
	}

}
