<?php
/**
 * Output Page
 *
 * @author   Magazine3
 * @category Frontend
 * @path  output/elementor
 * @version 1.9.24
 */
if (! defined('ABSPATH') ) exit;

/**
 * Function to generate schema markup for elementor Faq block
 * @global type $post
 * @global type $saswp_elementor_faq
 * @return type array
 */
function saswp_elementor_faq_schema(){
              
            $input1 = array();
            
            global $post, $saswp_elementor_faq;
            
            if($saswp_elementor_faq){

                           $input1['@context']              = saswp_context_url();
                           $input1['@type']                 = 'FAQPage';
                           $input1['@id']                   = trailingslashit(saswp_get_permalink()).'#FAQPage';                            

                               $faq_question_arr = array();

                               foreach($saswp_elementor_faq as $val){

                                   $supply_data = array();
                                   $supply_data['@type']                   = 'Question';
                                   $supply_data['name']                    = $val['faq_question'];
                                   $supply_data['acceptedAnswer']['@type'] = 'Answer';
                                   $supply_data['acceptedAnswer']['text']  = $val['faq_answer'];
 
                                   $faq_question_arr[] =  $supply_data;
                               }
                              $input1['mainEntity'] = $faq_question_arr;                           

           }

            return $input1;
    
}