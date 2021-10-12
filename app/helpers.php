<?php

class Helper
{
  public static function color($status)
  {
    switch ($status) {
      case 'received':
        return 'danger';
        break;
      case 'confirmed':
        return 'warning';
        break;
      case 'in_production':
        return 'primary';
        break;
      case 'shipped':
        return 'info';
        break;
      case 'completed':
        return 'success';
        break;
    }
  }
}
