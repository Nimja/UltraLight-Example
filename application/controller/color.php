<?php namespace App\Controller;
/**
 * Color class example page.
 */
class Color extends Index
{
    const STEP_SIZE = 0.02;

    protected function _run()
    {
        $gamma = \Request::value('gamma', \Core\Format\Color::GAMMA);
        $data = array(
            'gamma' => $gamma,
            'gradient1' => $this->_drawColorFade(array('ff0000', '0000ff', '00ff00', 'ff0000'), $gamma),
            'gradient2' => $this->_drawColorFade(array('ffff00', '00ffff', 'ff00ff', 'ffff00'), $gamma),
            'gradient3' => $this->_drawColorFade(array('ffffff', '000000', '99ccff', 'ff99cc'), $gamma),
        );
        return $this->_output('Color fades', $this->_show('page/color', $data));
    }

    /**
     * Draw color-fade, fading normally through all steps.
     * @param array $blocks
     * @param float $gamma
     */
    private function _drawColorFade($blocks, $gamma)
    {
        $previousBlock = array_shift($blocks);
        $colors = array();
        foreach ($blocks as $block) {
            $from = new \Core\Format\Color($previousBlock, $gamma);
            $to = new \Core\Format\Color($block, $gamma);
            for ($i = 0; $i <= 1; $i += self::STEP_SIZE) {
                $colors[] = $from->fadeTo($to, $i);
            }
            $previousBlock = $block;
        }
        return $this->_drawColors($colors);
    }

    /**
     * Draw colors for testing.
     * @param type $colors
     * @return type
     */
    private function _drawColors($colors)
    {
        $result = array();
        foreach ($colors as $color) {
            $result[] = "<div style=\"background: {$color}; overflow: hidden; height: 4px; \">&nbsp;</div>";
        }
        return implode(PHP_EOL, $result);
    }
}
