export function clientShowOrder() {
  let showOrder = document.querySelector('#client-show-order');

  if (showOrder) {
    let orderPaymentStatus = document.querySelector('#order-payment-status');
    let orderDeliveryStatus = document.querySelector('#order-delivery-status');

    setOrderPaymentStatusClass(orderPaymentStatus);
    setOrderDeliveryStatusClass(orderDeliveryStatus);
  }
}

function setOrderPaymentStatusClass(statusEl) {
  const paymentStatus = {
    unpaid: 'Unpaid',
    paid: 'Paid',
    canceled: 'Canceled'
  }

  switch (statusEl.dataset.paymentStatus) {
    case paymentStatus.unpaid:
      statusEl.classList.add('bg-danger');
      break;

    case paymentStatus.paid:
      statusEl.classList.add('bg-success');
      break;

    case paymentStatus.canceled:
      statusEl.classList.add('bg-danger');
      break;
  }
}

function setOrderDeliveryStatusClass(statusEl) {
  const deliveryStatus = {
    waiting: 'Waiting',
    confirmed: 'Confirmed',
    onProgress: 'On Progress',
    ready: 'Ready',
    delivery: 'Delivery',
    finish: 'Finish',
    failed: 'Failed',
    canceled: 'Canceled',
  }

  switch (statusEl.dataset.deliveryStatus) {
    case deliveryStatus.waiting:
      statusEl.classList.add('bg-secondary');
      break;

    case deliveryStatus.confirmed:
      statusEl.classList.add('bg-primary');
      break;

    case deliveryStatus.onProgress:
      statusEl.classList.add('bg-primary');
      break;

    case deliveryStatus.ready:
      statusEl.classList.add('bg-success');
      break;

    case deliveryStatus.delivery:
      statusEl.classList.add('bg-warning');
      break;

    case deliveryStatus.finish:
      statusEl.classList.add('bg-success');
      break;

    case deliveryStatus.failed:
      statusEl.classList.add('bg-danger');
      break;

    case deliveryStatus.canceled:
      statusEl.classList.add('bg-danger');
      break;
  }
}
