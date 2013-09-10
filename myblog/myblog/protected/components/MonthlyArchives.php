<?php
  // @version $Id: MonthlyArchives.php 68 2010-08-20 09:43:02Z mocapapa@g.pugpug.org $
Yii::import('zii.widgets.CPortlet');

class MonthlyArchives extends CPortlet
{
  public $title='Archives';
  public $year = 'Äê';
  public $month = 'ÔÂ';

  public function findAllArticleDate()
  {
    return Article::model()->findArchives();
  }

  protected function renderContent()
  {
    $this->render('monthlyArchives');
  }

}