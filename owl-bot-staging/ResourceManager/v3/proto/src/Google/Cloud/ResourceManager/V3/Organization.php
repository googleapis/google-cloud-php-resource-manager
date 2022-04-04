<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/resourcemanager/v3/organizations.proto

namespace Google\Cloud\ResourceManager\V3;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * The root node in the resource hierarchy to which a particular entity's
 * (a company, for example) resources belong.
 *
 * Generated from protobuf message <code>google.cloud.resourcemanager.v3.Organization</code>
 */
class Organization extends \Google\Protobuf\Internal\Message
{
    /**
     * Output only. The resource name of the organization. This is the
     * organization's relative path in the API. Its format is
     * "organizations/[organization_id]". For example, "organizations/1234".
     *
     * Generated from protobuf field <code>string name = 1 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    protected $name = '';
    /**
     * Output only. A human-readable string that refers to the organization in the
     * Google Cloud Console. This string is set by the server and cannot be
     * changed. The string will be set to the primary domain (for example,
     * "google.com") of the Google Workspace customer that owns the organization.
     *
     * Generated from protobuf field <code>string display_name = 2 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    protected $display_name = '';
    /**
     * Output only. The organization's current lifecycle state.
     *
     * Generated from protobuf field <code>.google.cloud.resourcemanager.v3.Organization.State state = 4 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    protected $state = 0;
    /**
     * Output only. Timestamp when the Organization was created.
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp create_time = 5 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    protected $create_time = null;
    /**
     * Output only. Timestamp when the Organization was last modified.
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp update_time = 6 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    protected $update_time = null;
    /**
     * Output only. Timestamp when the Organization was requested for deletion.
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp delete_time = 7 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    protected $delete_time = null;
    /**
     * Output only. A checksum computed by the server based on the current value of the
     * Organization resource. This may be sent on update and delete requests to
     * ensure the client has an up-to-date value before proceeding.
     *
     * Generated from protobuf field <code>string etag = 8 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    protected $etag = '';
    protected $owner;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $name
     *           Output only. The resource name of the organization. This is the
     *           organization's relative path in the API. Its format is
     *           "organizations/[organization_id]". For example, "organizations/1234".
     *     @type string $display_name
     *           Output only. A human-readable string that refers to the organization in the
     *           Google Cloud Console. This string is set by the server and cannot be
     *           changed. The string will be set to the primary domain (for example,
     *           "google.com") of the Google Workspace customer that owns the organization.
     *     @type string $directory_customer_id
     *           Immutable. The G Suite / Workspace customer id used in the Directory API.
     *     @type int $state
     *           Output only. The organization's current lifecycle state.
     *     @type \Google\Protobuf\Timestamp $create_time
     *           Output only. Timestamp when the Organization was created.
     *     @type \Google\Protobuf\Timestamp $update_time
     *           Output only. Timestamp when the Organization was last modified.
     *     @type \Google\Protobuf\Timestamp $delete_time
     *           Output only. Timestamp when the Organization was requested for deletion.
     *     @type string $etag
     *           Output only. A checksum computed by the server based on the current value of the
     *           Organization resource. This may be sent on update and delete requests to
     *           ensure the client has an up-to-date value before proceeding.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Resourcemanager\V3\Organizations::initOnce();
        parent::__construct($data);
    }

    /**
     * Output only. The resource name of the organization. This is the
     * organization's relative path in the API. Its format is
     * "organizations/[organization_id]". For example, "organizations/1234".
     *
     * Generated from protobuf field <code>string name = 1 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Output only. The resource name of the organization. This is the
     * organization's relative path in the API. Its format is
     * "organizations/[organization_id]". For example, "organizations/1234".
     *
     * Generated from protobuf field <code>string name = 1 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param string $var
     * @return $this
     */
    public function setName($var)
    {
        GPBUtil::checkString($var, True);
        $this->name = $var;

        return $this;
    }

    /**
     * Output only. A human-readable string that refers to the organization in the
     * Google Cloud Console. This string is set by the server and cannot be
     * changed. The string will be set to the primary domain (for example,
     * "google.com") of the Google Workspace customer that owns the organization.
     *
     * Generated from protobuf field <code>string display_name = 2 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return string
     */
    public function getDisplayName()
    {
        return $this->display_name;
    }

    /**
     * Output only. A human-readable string that refers to the organization in the
     * Google Cloud Console. This string is set by the server and cannot be
     * changed. The string will be set to the primary domain (for example,
     * "google.com") of the Google Workspace customer that owns the organization.
     *
     * Generated from protobuf field <code>string display_name = 2 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param string $var
     * @return $this
     */
    public function setDisplayName($var)
    {
        GPBUtil::checkString($var, True);
        $this->display_name = $var;

        return $this;
    }

    /**
     * Immutable. The G Suite / Workspace customer id used in the Directory API.
     *
     * Generated from protobuf field <code>string directory_customer_id = 3 [(.google.api.field_behavior) = IMMUTABLE];</code>
     * @return string
     */
    public function getDirectoryCustomerId()
    {
        return $this->readOneof(3);
    }

    public function hasDirectoryCustomerId()
    {
        return $this->hasOneof(3);
    }

    /**
     * Immutable. The G Suite / Workspace customer id used in the Directory API.
     *
     * Generated from protobuf field <code>string directory_customer_id = 3 [(.google.api.field_behavior) = IMMUTABLE];</code>
     * @param string $var
     * @return $this
     */
    public function setDirectoryCustomerId($var)
    {
        GPBUtil::checkString($var, True);
        $this->writeOneof(3, $var);

        return $this;
    }

    /**
     * Output only. The organization's current lifecycle state.
     *
     * Generated from protobuf field <code>.google.cloud.resourcemanager.v3.Organization.State state = 4 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return int
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Output only. The organization's current lifecycle state.
     *
     * Generated from protobuf field <code>.google.cloud.resourcemanager.v3.Organization.State state = 4 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param int $var
     * @return $this
     */
    public function setState($var)
    {
        GPBUtil::checkEnum($var, \Google\Cloud\ResourceManager\V3\Organization\State::class);
        $this->state = $var;

        return $this;
    }

    /**
     * Output only. Timestamp when the Organization was created.
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp create_time = 5 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return \Google\Protobuf\Timestamp|null
     */
    public function getCreateTime()
    {
        return $this->create_time;
    }

    public function hasCreateTime()
    {
        return isset($this->create_time);
    }

    public function clearCreateTime()
    {
        unset($this->create_time);
    }

    /**
     * Output only. Timestamp when the Organization was created.
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp create_time = 5 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param \Google\Protobuf\Timestamp $var
     * @return $this
     */
    public function setCreateTime($var)
    {
        GPBUtil::checkMessage($var, \Google\Protobuf\Timestamp::class);
        $this->create_time = $var;

        return $this;
    }

    /**
     * Output only. Timestamp when the Organization was last modified.
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp update_time = 6 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return \Google\Protobuf\Timestamp|null
     */
    public function getUpdateTime()
    {
        return $this->update_time;
    }

    public function hasUpdateTime()
    {
        return isset($this->update_time);
    }

    public function clearUpdateTime()
    {
        unset($this->update_time);
    }

    /**
     * Output only. Timestamp when the Organization was last modified.
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp update_time = 6 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param \Google\Protobuf\Timestamp $var
     * @return $this
     */
    public function setUpdateTime($var)
    {
        GPBUtil::checkMessage($var, \Google\Protobuf\Timestamp::class);
        $this->update_time = $var;

        return $this;
    }

    /**
     * Output only. Timestamp when the Organization was requested for deletion.
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp delete_time = 7 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return \Google\Protobuf\Timestamp|null
     */
    public function getDeleteTime()
    {
        return $this->delete_time;
    }

    public function hasDeleteTime()
    {
        return isset($this->delete_time);
    }

    public function clearDeleteTime()
    {
        unset($this->delete_time);
    }

    /**
     * Output only. Timestamp when the Organization was requested for deletion.
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp delete_time = 7 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param \Google\Protobuf\Timestamp $var
     * @return $this
     */
    public function setDeleteTime($var)
    {
        GPBUtil::checkMessage($var, \Google\Protobuf\Timestamp::class);
        $this->delete_time = $var;

        return $this;
    }

    /**
     * Output only. A checksum computed by the server based on the current value of the
     * Organization resource. This may be sent on update and delete requests to
     * ensure the client has an up-to-date value before proceeding.
     *
     * Generated from protobuf field <code>string etag = 8 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return string
     */
    public function getEtag()
    {
        return $this->etag;
    }

    /**
     * Output only. A checksum computed by the server based on the current value of the
     * Organization resource. This may be sent on update and delete requests to
     * ensure the client has an up-to-date value before proceeding.
     *
     * Generated from protobuf field <code>string etag = 8 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param string $var
     * @return $this
     */
    public function setEtag($var)
    {
        GPBUtil::checkString($var, True);
        $this->etag = $var;

        return $this;
    }

    /**
     * @return string
     */
    public function getOwner()
    {
        return $this->whichOneof("owner");
    }

}

