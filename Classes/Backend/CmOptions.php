<?php
namespace GridElementsTeam\Gridelements\Backend;

use TYPO3\CMS\Backend\ClickMenu\ClickMenu;

/**
 * Class/Function which
 *
 * @author         Jo Hasenau <info@cybercraft.de>
 * @package        TYPO3
 * @subpackage     tx_gridelements
 */
class CmOptions {

	/**
	 * Main method
	 *
	 * @param ClickMenu $backRef
	 * @param array     $menuItems
	 * @param string    $table
	 * @param integer   $uid
	 *
	 * @return array
	 */
	public function main(ClickMenu &$backRef, array $menuItems, $table, $uid) {

		// add "paste reference after"
		$parkItem = $menuItems['pasteafter'];
		if ($parkItem) {
			unset($menuItems['pasteafter']);
			$menuItems['pasteafter'] = $parkItem;
			if ($backRef->clipObj->currentMode() === 'copy') {
				$parkItem[1] = $GLOBALS['LANG']->sL('LLL:EXT:gridelements/Resources/Private/Language/locallang_db.xml:tx_gridelements_clickmenu_pastereference');
				$parkItem[3] = preg_replace('/formToken/', 'reference=1&formToken', $parkItem[3]);
				$menuItems['pastereference'] = $parkItem;
			}
		}
		return $menuItems;
	}

}
