<?php
/**
 * Magento
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@magentocommerce.com so we can send you a copy immediately.
 *
 * @category   Charityclear
 * @package    Hosted
 * @copyright  Copyright (c) 2009 - 2012 Charityclear Limited (http://www.charityclear.com)
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

class CharityClear_CharityClearHosted_Block_Standard_Redirect extends Mage_Core_Block_Abstract {
    
    protected function _toHtml() {
        
        $standard = Mage::getModel('CharityClearHosted/standard');

        $form = new Varien_Data_Form();
        $form->setAction($standard->getCharityClearHostedUrl())
        ->setId('CharityClearHosted_standard_checkout')
        ->setName('CharityClearHosted_standard_checkout')
        ->setMethod('POST')
        ->setUseContainer(true);
        
        foreach ($standard->getStandardCheckoutFormFields() as $field=>$value) {
            
            $form->addField($field, 'hidden', array('name'=>$field, 'value'=>$value));
            
        }
        
        $html = '<html><body>';
        $html.= $this->__('<strong>Please wait... You will be redirected to Charityclear in a few seconds.</strong>');
        $html.= $form->toHtml();
        $html.= '<script type="text/javascript">document.getElementById("CharityClearHosted_standard_checkout").submit();</script>';
        $html.= '</body></html>';

        return $html;
        
    }

}
