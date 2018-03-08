<?php
/**
 * @package ZShapeTech_BestSellers
 * @author ZShapeTech <zshapetech@gmail.com>
 * @license http://www.opensource.org/licenses/mit-license.html  MIT License
 * @version $Id$
 */
namespace ZShapeTech\BestSellers\Block\Widget;
use Magento\Framework\View\Element\Template;
use Magento\Widget\Block\BlockInterface;
use Magento\Catalog\Model\ProductRepository;
use Magento\Catalog\Block\Product\AbstractProduct;
use ZShapeTech\BestSellers\Model\ResourceModel\Collection;
use ZShapeTech\Core\Helper\Data;

class BestSellers extends Template implements BlockInterface 
{

	const WISHLIST_ENABLE = 'zshape_bestsellers/options/wishlist';
	
	const COMPARE_ENABLE = 'zshape_bestsellers/options/compare';
	
	/**
     * Path to template file 
     *
     * @var string
     */
    protected $_template = 'widget/bestsellers.phtml';
	
	/**
	 * @var \ZShapeTech\BestSellers\Model\ResourceModel\Collection 
	 */
	protected $bestsellers;
	
	/**
	 * @var \Magento\Catalog\Model\ProductRepository;
	 */
	protected $productRepository;
	
	/**
	 * @var \Magento\Catalog\Block\Product\AbstractProduct
	 */ 
	protected $abstractProduct;
	
	/**
	 * @var \ZShapeTech\Core\Helper\Data
	 */
	protected $helper;
	
	/**
	 * @param \Magento\Framework\View\Element\Template\Context $context 
	 * @param \ZShapeTech\BestSellers\Model\ResourceModel\Collection $bestsellers
	 * @param array $data
	 */
	public function __construct(
		Template\Context $context, 
		Collection $bestsellers, 
		ProductRepository $productRepository,
		AbstractProduct $abstractProduct,
		Data $helper,
		array $data = []
	)
	{
		parent::__construct($context, $data);
		$this->bestsellers = $bestsellers;
		$this->productRepository = $productRepository;
		$this->abstractProduct = $abstractProduct;
		$this->helper = $helper;
	}
	
	/**
	 * @return array 
	 */
	public function getBestSellers()
	{
		$bestsellers = array();
		
		if(count($this->bestsellers)) {
			foreach($this->bestsellers as $bestseller) {
				$productId = $bestseller->getProductId();
				$bestsellers[] = $this->productRepository->getById($productId);
			}
		}
		
		return $bestsellers;
	}
	
	/**
	 * @param \Magento\Catalog\Model\Product $product
	 * @param string $imageId 
	 * @param array $attributes
	 * @return \Magento\Catalog\Block\Product\Image
	 */
	public function getImage($product, $imageId, $attributes = [])
	{
		return $this->abstractProduct->getImage($product, $imageId, $attributes = []);
	}
	
	/**
	 * @param \Magento\Catalog\Model\Product $product
     * @param array $additional
     * @return string
     */
	public function getAddToCartUrl($product, $additional = []) 
	{
		return $this->abstractProduct->getAddToCartUrl($product, $additional = []);
	}
	
	/**
     * @param \Magento\Catalog\Model\Product $product
     * @param bool $templateType
     * @param bool $displayIfNoReviews
     * @return string
     */
    public function getReviewsSummaryHtml(
        \Magento\Catalog\Model\Product $product,
        $templateType = false,
        $displayIfNoReviews = false
    ) {
		return $this->abstractProduct->getReviewsSummaryHtml($product, $templateType, $displayIfNoReviews);
	}
	
	/**
     * @param \Magento\Catalog\Model\Product $product
     * @return string
     */
    public function getAddToWishlistParams($product)
    {
        return $this->abstractProduct->getAddToWishlistParams($product);
    }
    
    /**
     *
     * @return string
     */
    public function getAddToCompareUrl()
    {
        return $this->abstractProduct->getAddToCompareUrl();
    }
    
    /**
     * @return bool
     */
    public function getWishlistEnable()
    {
		return $this->helper->getConfigValue(self::WISHLIST_ENABLE);
	}	
	
	/**
     * @return bool
     */
    public function getCompareEnable()
    {
		return $this->helper->getConfigValue(self::COMPARE_ENABLE);
	}
    	
	/**
	 * @var string $param
	 * @return string
	 */ 
	public function getBestSellersParam($param)
	{
		return $this->getData($param);
	}
}
