<?php namespace Nekromoff\Pipedrive\Library;

/**
 * Pipedrive Organizations Methods
 *
 * Organizations are companies and other kinds of organizations you are making
 * Deals with. Persons can be associated with organizations so that each
 * organization can contain one or more Persons.
 *
 */
class OrganizationFields
{
    /**
     * Hold the pipedrive cURL session
     * @var Curl Object
     */
    protected $curl;

    /**
     * Initialise the object load master class
     */
    public function __construct(\Nekromoff\Pipedrive\Pipedrive $master)
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
        return $this->curl->get('organizationFields/' . $id);
    }

    /**
     * Returns all organizations
     *
     * @param  array $data (filter_id, start, limit, sort_by, sort_mode)
     * @return array returns detials of all organizations
     */
    public function getAll()
    {
        return $this->curl->get('organizationFields');
    }
}
