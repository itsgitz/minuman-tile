import { clientOrdersMain } from './client/index';
import { clientShowOrder } from './client/show';
import { adminOrdersMain } from './admin/index';
import { adminShowOrder } from './admin/show';
import { myDatePicker } from './admin/index';

export function runOrders() {
  //Client area code
  clientOrdersMain();
  clientShowOrder();

  //Admin area code
  adminOrdersMain();
  adminShowOrder();

  myDatePicker();
}
