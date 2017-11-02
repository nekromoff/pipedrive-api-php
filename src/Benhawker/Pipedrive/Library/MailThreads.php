<?php namespace Benhawker\Pipedrive\Library;

/**
 * Mail Threads Methods
 *
 */
class MailThreads
{
    /**
     * Hold the pipedrive cURL session
     * @var Curl Object
     */
    protected $curl;

    /**
     * Initialise the object load master class
     */
    public function __construct(\Benhawker\Pipedrive\Pipedrive $master)
    {
        //associate curl class
        $this->curl = $master->curl();
    }

    /**
     * Returns a organization
     *
     * @param  int   $id pipedrive organizations id
     * @return array returns detials of a organization
     */
    public function getById($id)
    {
        return $this->curl->get('mailbox/mailThreads/' . $id);
    }

    /**
     * Returns all organizations
     *
     * @param  array $data (filter_id, start, limit, sort_by, sort_mode)
     * @return array returns detials of all organizations
     */
    public function getAll($data = array('folder'=>'inbox'))
    {
        return $this->curl->get('mailbox/mailThreads', $data);
    }
}
