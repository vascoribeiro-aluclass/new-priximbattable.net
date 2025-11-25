<?php

class CheckoutAddressesStep extends CheckoutAddressesStepCore
{

    public function getTemplateParameters()
    {
        $idAddressDelivery = (int) $this->getCheckoutSession()->getIdAddressDelivery();
        $idAddressInvoice = (int) $this->getCheckoutSession()->getIdAddressInvoice();
        $params = [
            'address_form' => $this->addressForm->getProxy(),
            'use_same_address' => $this->use_same_address,
            'use_different_address_url' => $this->context->link->getPageLink(
                'order',
                true,
                null,
                ['use_same_address' => 0]
            ),
            'new_address_delivery_url' => $this->context->link->getPageLink(
                'order',
                true,
                null,
                ['newAddress' => 'delivery','shipfree' => 3]
            ),
            'new_address_invoice_url' => $this->context->link->getPageLink(
                'order',
                true,
                null,
                ['newAddress' => 'invoice','shipfree' => 3]
            ),
            'id_address' => (int) Tools::getValue('id_address'),
            'id_address_delivery' => $idAddressDelivery,
            'id_address_invoice' => $idAddressInvoice,
            'show_delivery_address_form' => $this->show_delivery_address_form,
            'show_invoice_address_form' => $this->show_invoice_address_form,
            'form_has_continue_button' => $this->form_has_continue_button,
        ];

        /** @var OrderControllerCore $controller */
        $controller = $this->context->controller;
        if (isset($controller)) {
            $warnings = $controller->checkoutWarning;
            $addressWarning = isset($warnings['address'])
                ? $warnings['address']
                : false;
            $invalidAddresses = isset($warnings['invalid_addresses'])
                ? $warnings['invalid_addresses']
                : [];

            $errors = [];
            if (in_array($idAddressDelivery, $invalidAddresses)) {
                $errors['delivery_address_error'] = $addressWarning;
            }

            if (in_array($idAddressInvoice, $invalidAddresses)) {
                $errors['invoice_address_error'] = $addressWarning;
            }

            if ($this->show_invoice_address_form
                || $idAddressInvoice != $idAddressDelivery
                || !empty($errors['invoice_address_error'])
            ) {
                $this->use_same_address = false;
            }

            // Add specific parameters
            $params = array_replace(
                $params,
                [
                    'not_valid_addresses' => implode(',', $invalidAddresses),
                    'use_same_address' => $this->use_same_address,
                ],
                $errors
            );
        }

        return $params;
    }

}