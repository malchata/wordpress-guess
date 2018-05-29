<?php
/*
 * Copyright 2014 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License"); you may not
 * use this file except in compliance with the License. You may obtain a copy of
 * the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations under
 * the License.
 */

class Google_Service_AndroidManagement_Policy extends Google_Collection
{
  protected $collection_key = 'stayOnPluggedModes';
  public $accountTypesWithManagementDisabled;
  public $addUserDisabled;
  public $adjustVolumeDisabled;
  protected $alwaysOnVpnPackageType = 'Google_Service_AndroidManagement_AlwaysOnVpnPackage';
  protected $alwaysOnVpnPackageDataType = '';
  protected $applicationsType = 'Google_Service_AndroidManagement_ApplicationPolicy';
  protected $applicationsDataType = 'array';
  public $autoTimeRequired;
  public $blockApplicationsEnabled;
  public $bluetoothConfigDisabled;
  public $bluetoothContactSharingDisabled;
  public $bluetoothDisabled;
  public $cameraDisabled;
  public $cellBroadcastsConfigDisabled;
  protected $complianceRulesType = 'Google_Service_AndroidManagement_ComplianceRule';
  protected $complianceRulesDataType = 'array';
  public $createWindowsDisabled;
  public $credentialsConfigDisabled;
  public $dataRoamingDisabled;
  public $debuggingFeaturesAllowed;
  public $defaultPermissionPolicy;
  public $ensureVerifyAppsEnabled;
  public $factoryResetDisabled;
  public $frpAdminEmails;
  public $funDisabled;
  public $installAppsDisabled;
  public $installUnknownSourcesAllowed;
  public $keyguardDisabled;
  public $keyguardDisabledFeatures;
  protected $longSupportMessageType = 'Google_Service_AndroidManagement_UserFacingMessage';
  protected $longSupportMessageDataType = '';
  public $maximumTimeToLock;
  public $mobileNetworksConfigDisabled;
  public $modifyAccountsDisabled;
  public $mountPhysicalMediaDisabled;
  public $name;
  public $networkEscapeHatchEnabled;
  public $networkResetDisabled;
  public $openNetworkConfiguration;
  public $outgoingBeamDisabled;
  public $outgoingCallsDisabled;
  protected $passwordRequirementsType = 'Google_Service_AndroidManagement_PasswordRequirements';
  protected $passwordRequirementsDataType = '';
  protected $permittedInputMethodsType = 'Google_Service_AndroidManagement_PackageNameList';
  protected $permittedInputMethodsDataType = '';
  protected $persistentPreferredActivitiesType = 'Google_Service_AndroidManagement_PersistentPreferredActivity';
  protected $persistentPreferredActivitiesDataType = 'array';
  protected $recommendedGlobalProxyType = 'Google_Service_AndroidManagement_ProxyInfo';
  protected $recommendedGlobalProxyDataType = '';
  public $removeUserDisabled;
  public $safeBootDisabled;
  public $screenCaptureDisabled;
  public $setUserIconDisabled;
  public $setWallpaperDisabled;
  protected $shortSupportMessageType = 'Google_Service_AndroidManagement_UserFacingMessage';
  protected $shortSupportMessageDataType = '';
  public $smsDisabled;
  public $statusBarDisabled;
  protected $statusReportingSettingsType = 'Google_Service_AndroidManagement_StatusReportingSettings';
  protected $statusReportingSettingsDataType = '';
  public $stayOnPluggedModes;
  protected $systemUpdateType = 'Google_Service_AndroidManagement_SystemUpdate';
  protected $systemUpdateDataType = '';
  public $tetheringConfigDisabled;
  public $uninstallAppsDisabled;
  public $unmuteMicrophoneDisabled;
  public $usbFileTransferDisabled;
  public $version;
  public $vpnConfigDisabled;
  public $wifiConfigDisabled;
  public $wifiConfigsLockdownEnabled;

  public function setAccountTypesWithManagementDisabled($accountTypesWithManagementDisabled)
  {
    $this->accountTypesWithManagementDisabled = $accountTypesWithManagementDisabled;
  }
  public function getAccountTypesWithManagementDisabled()
  {
    return $this->accountTypesWithManagementDisabled;
  }
  public function setAddUserDisabled($addUserDisabled)
  {
    $this->addUserDisabled = $addUserDisabled;
  }
  public function getAddUserDisabled()
  {
    return $this->addUserDisabled;
  }
  public function setAdjustVolumeDisabled($adjustVolumeDisabled)
  {
    $this->adjustVolumeDisabled = $adjustVolumeDisabled;
  }
  public function getAdjustVolumeDisabled()
  {
    return $this->adjustVolumeDisabled;
  }
  /**
   * @param Google_Service_AndroidManagement_AlwaysOnVpnPackage
   */
  public function setAlwaysOnVpnPackage(Google_Service_AndroidManagement_AlwaysOnVpnPackage $alwaysOnVpnPackage)
  {
    $this->alwaysOnVpnPackage = $alwaysOnVpnPackage;
  }
  /**
   * @return Google_Service_AndroidManagement_AlwaysOnVpnPackage
   */
  public function getAlwaysOnVpnPackage()
  {
    return $this->alwaysOnVpnPackage;
  }
  /**
   * @param Google_Service_AndroidManagement_ApplicationPolicy
   */
  public function setApplications($applications)
  {
    $this->applications = $applications;
  }
  /**
   * @return Google_Service_AndroidManagement_ApplicationPolicy
   */
  public function getApplications()
  {
    return $this->applications;
  }
  public function setAutoTimeRequired($autoTimeRequired)
  {
    $this->autoTimeRequired = $autoTimeRequired;
  }
  public function getAutoTimeRequired()
  {
    return $this->autoTimeRequired;
  }
  public function setBlockApplicationsEnabled($blockApplicationsEnabled)
  {
    $this->blockApplicationsEnabled = $blockApplicationsEnabled;
  }
  public function getBlockApplicationsEnabled()
  {
    return $this->blockApplicationsEnabled;
  }
  public function setBluetoothConfigDisabled($bluetoothConfigDisabled)
  {
    $this->bluetoothConfigDisabled = $bluetoothConfigDisabled;
  }
  public function getBluetoothConfigDisabled()
  {
    return $this->bluetoothConfigDisabled;
  }
  public function setBluetoothContactSharingDisabled($bluetoothContactSharingDisabled)
  {
    $this->bluetoothContactSharingDisabled = $bluetoothContactSharingDisabled;
  }
  public function getBluetoothContactSharingDisabled()
  {
    return $this->bluetoothContactSharingDisabled;
  }
  public function setBluetoothDisabled($bluetoothDisabled)
  {
    $this->bluetoothDisabled = $bluetoothDisabled;
  }
  public function getBluetoothDisabled()
  {
    return $this->bluetoothDisabled;
  }
  public function setCameraDisabled($cameraDisabled)
  {
    $this->cameraDisabled = $cameraDisabled;
  }
  public function getCameraDisabled()
  {
    return $this->cameraDisabled;
  }
  public function setCellBroadcastsConfigDisabled($cellBroadcastsConfigDisabled)
  {
    $this->cellBroadcastsConfigDisabled = $cellBroadcastsConfigDisabled;
  }
  public function getCellBroadcastsConfigDisabled()
  {
    return $this->cellBroadcastsConfigDisabled;
  }
  /**
   * @param Google_Service_AndroidManagement_ComplianceRule
   */
  public function setComplianceRules($complianceRules)
  {
    $this->complianceRules = $complianceRules;
  }
  /**
   * @return Google_Service_AndroidManagement_ComplianceRule
   */
  public function getComplianceRules()
  {
    return $this->complianceRules;
  }
  public function setCreateWindowsDisabled($createWindowsDisabled)
  {
    $this->createWindowsDisabled = $createWindowsDisabled;
  }
  public function getCreateWindowsDisabled()
  {
    return $this->createWindowsDisabled;
  }
  public function setCredentialsConfigDisabled($credentialsConfigDisabled)
  {
    $this->credentialsConfigDisabled = $credentialsConfigDisabled;
  }
  public function getCredentialsConfigDisabled()
  {
    return $this->credentialsConfigDisabled;
  }
  public function setDataRoamingDisabled($dataRoamingDisabled)
  {
    $this->dataRoamingDisabled = $dataRoamingDisabled;
  }
  public function getDataRoamingDisabled()
  {
    return $this->dataRoamingDisabled;
  }
  public function setDebuggingFeaturesAllowed($debuggingFeaturesAllowed)
  {
    $this->debuggingFeaturesAllowed = $debuggingFeaturesAllowed;
  }
  public function getDebuggingFeaturesAllowed()
  {
    return $this->debuggingFeaturesAllowed;
  }
  public function setDefaultPermissionPolicy($defaultPermissionPolicy)
  {
    $this->defaultPermissionPolicy = $defaultPermissionPolicy;
  }
  public function getDefaultPermissionPolicy()
  {
    return $this->defaultPermissionPolicy;
  }
  public function setEnsureVerifyAppsEnabled($ensureVerifyAppsEnabled)
  {
    $this->ensureVerifyAppsEnabled = $ensureVerifyAppsEnabled;
  }
  public function getEnsureVerifyAppsEnabled()
  {
    return $this->ensureVerifyAppsEnabled;
  }
  public function setFactoryResetDisabled($factoryResetDisabled)
  {
    $this->factoryResetDisabled = $factoryResetDisabled;
  }
  public function getFactoryResetDisabled()
  {
    return $this->factoryResetDisabled;
  }
  public function setFrpAdminEmails($frpAdminEmails)
  {
    $this->frpAdminEmails = $frpAdminEmails;
  }
  public function getFrpAdminEmails()
  {
    return $this->frpAdminEmails;
  }
  public function setFunDisabled($funDisabled)
  {
    $this->funDisabled = $funDisabled;
  }
  public function getFunDisabled()
  {
    return $this->funDisabled;
  }
  public function setInstallAppsDisabled($installAppsDisabled)
  {
    $this->installAppsDisabled = $installAppsDisabled;
  }
  public function getInstallAppsDisabled()
  {
    return $this->installAppsDisabled;
  }
  public function setInstallUnknownSourcesAllowed($installUnknownSourcesAllowed)
  {
    $this->installUnknownSourcesAllowed = $installUnknownSourcesAllowed;
  }
  public function getInstallUnknownSourcesAllowed()
  {
    return $this->installUnknownSourcesAllowed;
  }
  public function setKeyguardDisabled($keyguardDisabled)
  {
    $this->keyguardDisabled = $keyguardDisabled;
  }
  public function getKeyguardDisabled()
  {
    return $this->keyguardDisabled;
  }
  public function setKeyguardDisabledFeatures($keyguardDisabledFeatures)
  {
    $this->keyguardDisabledFeatures = $keyguardDisabledFeatures;
  }
  public function getKeyguardDisabledFeatures()
  {
    return $this->keyguardDisabledFeatures;
  }
  /**
   * @param Google_Service_AndroidManagement_UserFacingMessage
   */
  public function setLongSupportMessage(Google_Service_AndroidManagement_UserFacingMessage $longSupportMessage)
  {
    $this->longSupportMessage = $longSupportMessage;
  }
  /**
   * @return Google_Service_AndroidManagement_UserFacingMessage
   */
  public function getLongSupportMessage()
  {
    return $this->longSupportMessage;
  }
  public function setMaximumTimeToLock($maximumTimeToLock)
  {
    $this->maximumTimeToLock = $maximumTimeToLock;
  }
  public function getMaximumTimeToLock()
  {
    return $this->maximumTimeToLock;
  }
  public function setMobileNetworksConfigDisabled($mobileNetworksConfigDisabled)
  {
    $this->mobileNetworksConfigDisabled = $mobileNetworksConfigDisabled;
  }
  public function getMobileNetworksConfigDisabled()
  {
    return $this->mobileNetworksConfigDisabled;
  }
  public function setModifyAccountsDisabled($modifyAccountsDisabled)
  {
    $this->modifyAccountsDisabled = $modifyAccountsDisabled;
  }
  public function getModifyAccountsDisabled()
  {
    return $this->modifyAccountsDisabled;
  }
  public function setMountPhysicalMediaDisabled($mountPhysicalMediaDisabled)
  {
    $this->mountPhysicalMediaDisabled = $mountPhysicalMediaDisabled;
  }
  public function getMountPhysicalMediaDisabled()
  {
    return $this->mountPhysicalMediaDisabled;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setNetworkEscapeHatchEnabled($networkEscapeHatchEnabled)
  {
    $this->networkEscapeHatchEnabled = $networkEscapeHatchEnabled;
  }
  public function getNetworkEscapeHatchEnabled()
  {
    return $this->networkEscapeHatchEnabled;
  }
  public function setNetworkResetDisabled($networkResetDisabled)
  {
    $this->networkResetDisabled = $networkResetDisabled;
  }
  public function getNetworkResetDisabled()
  {
    return $this->networkResetDisabled;
  }
  public function setOpenNetworkConfiguration($openNetworkConfiguration)
  {
    $this->openNetworkConfiguration = $openNetworkConfiguration;
  }
  public function getOpenNetworkConfiguration()
  {
    return $this->openNetworkConfiguration;
  }
  public function setOutgoingBeamDisabled($outgoingBeamDisabled)
  {
    $this->outgoingBeamDisabled = $outgoingBeamDisabled;
  }
  public function getOutgoingBeamDisabled()
  {
    return $this->outgoingBeamDisabled;
  }
  public function setOutgoingCallsDisabled($outgoingCallsDisabled)
  {
    $this->outgoingCallsDisabled = $outgoingCallsDisabled;
  }
  public function getOutgoingCallsDisabled()
  {
    return $this->outgoingCallsDisabled;
  }
  /**
   * @param Google_Service_AndroidManagement_PasswordRequirements
   */
  public function setPasswordRequirements(Google_Service_AndroidManagement_PasswordRequirements $passwordRequirements)
  {
    $this->passwordRequirements = $passwordRequirements;
  }
  /**
   * @return Google_Service_AndroidManagement_PasswordRequirements
   */
  public function getPasswordRequirements()
  {
    return $this->passwordRequirements;
  }
  /**
   * @param Google_Service_AndroidManagement_PackageNameList
   */
  public function setPermittedInputMethods(Google_Service_AndroidManagement_PackageNameList $permittedInputMethods)
  {
    $this->permittedInputMethods = $permittedInputMethods;
  }
  /**
   * @return Google_Service_AndroidManagement_PackageNameList
   */
  public function getPermittedInputMethods()
  {
    return $this->permittedInputMethods;
  }
  /**
   * @param Google_Service_AndroidManagement_PersistentPreferredActivity
   */
  public function setPersistentPreferredActivities($persistentPreferredActivities)
  {
    $this->persistentPreferredActivities = $persistentPreferredActivities;
  }
  /**
   * @return Google_Service_AndroidManagement_PersistentPreferredActivity
   */
  public function getPersistentPreferredActivities()
  {
    return $this->persistentPreferredActivities;
  }
  /**
   * @param Google_Service_AndroidManagement_ProxyInfo
   */
  public function setRecommendedGlobalProxy(Google_Service_AndroidManagement_ProxyInfo $recommendedGlobalProxy)
  {
    $this->recommendedGlobalProxy = $recommendedGlobalProxy;
  }
  /**
   * @return Google_Service_AndroidManagement_ProxyInfo
   */
  public function getRecommendedGlobalProxy()
  {
    return $this->recommendedGlobalProxy;
  }
  public function setRemoveUserDisabled($removeUserDisabled)
  {
    $this->removeUserDisabled = $removeUserDisabled;
  }
  public function getRemoveUserDisabled()
  {
    return $this->removeUserDisabled;
  }
  public function setSafeBootDisabled($safeBootDisabled)
  {
    $this->safeBootDisabled = $safeBootDisabled;
  }
  public function getSafeBootDisabled()
  {
    return $this->safeBootDisabled;
  }
  public function setScreenCaptureDisabled($screenCaptureDisabled)
  {
    $this->screenCaptureDisabled = $screenCaptureDisabled;
  }
  public function getScreenCaptureDisabled()
  {
    return $this->screenCaptureDisabled;
  }
  public function setSetUserIconDisabled($setUserIconDisabled)
  {
    $this->setUserIconDisabled = $setUserIconDisabled;
  }
  public function getSetUserIconDisabled()
  {
    return $this->setUserIconDisabled;
  }
  public function setSetWallpaperDisabled($setWallpaperDisabled)
  {
    $this->setWallpaperDisabled = $setWallpaperDisabled;
  }
  public function getSetWallpaperDisabled()
  {
    return $this->setWallpaperDisabled;
  }
  /**
   * @param Google_Service_AndroidManagement_UserFacingMessage
   */
  public function setShortSupportMessage(Google_Service_AndroidManagement_UserFacingMessage $shortSupportMessage)
  {
    $this->shortSupportMessage = $shortSupportMessage;
  }
  /**
   * @return Google_Service_AndroidManagement_UserFacingMessage
   */
  public function getShortSupportMessage()
  {
    return $this->shortSupportMessage;
  }
  public function setSmsDisabled($smsDisabled)
  {
    $this->smsDisabled = $smsDisabled;
  }
  public function getSmsDisabled()
  {
    return $this->smsDisabled;
  }
  public function setStatusBarDisabled($statusBarDisabled)
  {
    $this->statusBarDisabled = $statusBarDisabled;
  }
  public function getStatusBarDisabled()
  {
    return $this->statusBarDisabled;
  }
  /**
   * @param Google_Service_AndroidManagement_StatusReportingSettings
   */
  public function setStatusReportingSettings(Google_Service_AndroidManagement_StatusReportingSettings $statusReportingSettings)
  {
    $this->statusReportingSettings = $statusReportingSettings;
  }
  /**
   * @return Google_Service_AndroidManagement_StatusReportingSettings
   */
  public function getStatusReportingSettings()
  {
    return $this->statusReportingSettings;
  }
  public function setStayOnPluggedModes($stayOnPluggedModes)
  {
    $this->stayOnPluggedModes = $stayOnPluggedModes;
  }
  public function getStayOnPluggedModes()
  {
    return $this->stayOnPluggedModes;
  }
  /**
   * @param Google_Service_AndroidManagement_SystemUpdate
   */
  public function setSystemUpdate(Google_Service_AndroidManagement_SystemUpdate $systemUpdate)
  {
    $this->systemUpdate = $systemUpdate;
  }
  /**
   * @return Google_Service_AndroidManagement_SystemUpdate
   */
  public function getSystemUpdate()
  {
    return $this->systemUpdate;
  }
  public function setTetheringConfigDisabled($tetheringConfigDisabled)
  {
    $this->tetheringConfigDisabled = $tetheringConfigDisabled;
  }
  public function getTetheringConfigDisabled()
  {
    return $this->tetheringConfigDisabled;
  }
  public function setUninstallAppsDisabled($uninstallAppsDisabled)
  {
    $this->uninstallAppsDisabled = $uninstallAppsDisabled;
  }
  public function getUninstallAppsDisabled()
  {
    return $this->uninstallAppsDisabled;
  }
  public function setUnmuteMicrophoneDisabled($unmuteMicrophoneDisabled)
  {
    $this->unmuteMicrophoneDisabled = $unmuteMicrophoneDisabled;
  }
  public function getUnmuteMicrophoneDisabled()
  {
    return $this->unmuteMicrophoneDisabled;
  }
  public function setUsbFileTransferDisabled($usbFileTransferDisabled)
  {
    $this->usbFileTransferDisabled = $usbFileTransferDisabled;
  }
  public function getUsbFileTransferDisabled()
  {
    return $this->usbFileTransferDisabled;
  }
  public function setVersion($version)
  {
    $this->version = $version;
  }
  public function getVersion()
  {
    return $this->version;
  }
  public function setVpnConfigDisabled($vpnConfigDisabled)
  {
    $this->vpnConfigDisabled = $vpnConfigDisabled;
  }
  public function getVpnConfigDisabled()
  {
    return $this->vpnConfigDisabled;
  }
  public function setWifiConfigDisabled($wifiConfigDisabled)
  {
    $this->wifiConfigDisabled = $wifiConfigDisabled;
  }
  public function getWifiConfigDisabled()
  {
    return $this->wifiConfigDisabled;
  }
  public function setWifiConfigsLockdownEnabled($wifiConfigsLockdownEnabled)
  {
    $this->wifiConfigsLockdownEnabled = $wifiConfigsLockdownEnabled;
  }
  public function getWifiConfigsLockdownEnabled()
  {
    return $this->wifiConfigsLockdownEnabled;
  }
}
