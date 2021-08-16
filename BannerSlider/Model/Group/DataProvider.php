<?php


namespace PHPCuong\BannerSlider\Model\Group;

use PHPCuong\BannerSlider\Model\ResourceModel\Group\CollectionFactory;
use Magento\Framework\App\Request\DataPersistorInterface;


class DataProvider extends \Magento\Ui\DataProvider\AbstractDataProvider
{
    
    protected $collection;

    protected $dataPersistor;

    protected $loadedData;

    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        CollectionFactory $groupCollectionFactory,
        DataPersistorInterface $dataPersistor,
        array $meta = [],
        array $data = []
    ) {
        $this->collection = $groupCollectionFactory->create();
        $this->dataPersistor = $dataPersistor;
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
    }

    public function getData()
    {
        if (isset($this->loadedData)) {
            return $this->loadedData;
        }
        $items = $this->collection->getItems();
        /** @var \PHPCuong\BannerSlider\Model\Group $group */
        foreach ($items as $group) {
            $this->loadedData[$group->getId()] = $group->getData();
        }

        // Used from the Save action
        $data = $this->dataPersistor->get('group_banners_slider');
        if (!empty($data)) {
            $group = $this->collection->getNewEmptyItem();
            $group->setData($data);
            $this->loadedData[$group->getId()] = $group->getData();
            $this->dataPersistor->clear('group_banners_slider');
        }

        return $this->loadedData;
    }
}
